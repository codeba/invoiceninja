<?php

class InvoiceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('list', array(
			'entityType'=>ENTITY_INVOICE, 
			'columns'=>['checkbox', 'Invoice Number', 'Client', 'Total', 'Amount Due', 'Invoice Date', 'Due Date', 'Status', 'Action']
		));
	}

	public function getDatatable($clientId = null)
    {
    	$collection = Invoice::with('client','invoice_items','invoice_status')->where('account_id','=',Auth::user()->account_id);

    	if ($clientId) {
    		$collection->where('client_id','=',$clientId);
    	}

    	$table = Datatable::collection($collection->get());

    	if (!$clientId) {
    		$table->addColumn('checkbox', function($model) { return '<input type="checkbox" name="ids[]" value="' . $model->id . '">'; });
    	}
    	
    	$table->addColumn('invoice_number', function($model) { return link_to('invoices/' . $model->id . '/edit', $model->invoice_number); });

    	if (!$clientId) {
    		$table->addColumn('client', function($model) { return link_to('clients/' . $model->client->id, $model->client->name); });
    	}
    	
    	return $table->addColumn('total', function($model){ return '$' . money_format('%i', $model->getTotal()); })
    		->addColumn('amount_due', function($model) { return '$' . money_format('%i', $model->getTotal()); })
    	    ->addColumn('invoice_date', function($model) { return (new Carbon($model->invoice_date))->toFormattedDateString(); })
    	    ->addColumn('due_date', function($model) { return $model->due_date == '0000-00-00' ? '' : (new Carbon($model->due_date))->toFormattedDateString(); })
    	    ->addColumn('status', function($model) { return $model->invoice_status->name; })
    	    ->addColumn('dropdown', function($model) 
    	    { 
    	    	return '<div class="btn-group tr-action" style="display:none">
  							<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
    							Select <span class="caret"></span>
  							</button>
  							<ul class="dropdown-menu" role="menu">
						    <li><a href="' . URL::to('invoices/'.$model->id.'/edit') . '">Edit</a></li>
						    <li class="divider"></li>
						    <li><a href="' . URL::to('invoices/'.$model->id.'/archive') . '">Archive</a></li>
						    <li><a href="javascript:deleteEntity(' . $model->id . ')">Delete</a></li>						    
						  </ul>
						</div>';
    	    })    	       	    
    	    ->orderColumns('number')
    	    ->make();    	
    }


	public function view($key)
	{
		$invitation = Invitation::with('invoice.invoice_items', 'invoice.client.account.account_gateways')->where('key', '=', $key)->firstOrFail();				
		$contact = null;

		$invitation->viewed_date = new date('Y-m-d H:i:s');
		$invitation->save();

		Activity::log($invitation->invoice->client, ACTIVITY_TYPE_VIEW_INVOICE, $contact, $invitation);

		return View::make('invoices.view')->with('invoice', $invitation->invoice);	
	}

	private function createGateway($accountGateway)
	{
        $gateway = Omnipay::create($accountGateway->gateway->provider);	
        $config = json_decode($accountGateway->config);
        
        /*
        $gateway->setSolutionType ("Sole");
        $gateway->setLandingPage("Billing");
        */
		
		foreach ($config as $key => $val)
		{
			if (!$val)
			{
				continue;
			}

			$function = "set" . ucfirst($key);
			$gateway->$function($val);
		}
		
		return $gateway;		
	}

	private function getPaymentDetails($invoice)
	{
		$data = array(
		    'firstName' => '',
		    'lastName' => '',
		);

		$card = new CreditCard($data);
			
		return [
			    'amount' => $invoice->getTotal(),
			    'card' => $card,
			    'currency' => 'USD',
			    'returnUrl' => URL::to('complete'),
			    'cancelUrl' => URL::to('/'),
		];
	}

	public function show_payment($invoiceKey)
	{
		$invoice = Invoice::with('invoice_items', 'client.account.account_gateways.gateway')->where('key', '=', $invoiceKey)->firstOrFail();
		$accountGateway = $invoice->client->account->account_gateways[0];
		$gateway = InvoiceController::createGateway($accountGateway);

		try
		{
			$details = InvoiceController::getPaymentDetails($invoice);
			$response = $gateway->purchase($details)->send();			
			$ref = $response->getTransactionReference();

			if (!$ref)
			{
				var_dump($response);
				exit('Sorry, there was an error processing your payment. Please try again later.');
			}

			$payment = new Payment;
			$payment->invoice_id = $invoice->id;
			$payment->account_id = $invoice->account_id;
			$payment->contact_id = 0; // TODO_FIX
			$payment->transaction_reference = $ref;
			$payment->save();

			if ($response->isSuccessful())
			{
				
			}
			else if ($response->isRedirect()) 
			{
	    		$response->redirect();	    	
	    	}
	    	else
	    	{

	    	}
	    } 
	    catch (\Exception $e) 
	    {
			exit('Sorry, there was an error processing your payment. Please try again later.<p>'.$e);
		}

		exit;
	}

	public function do_payment()
	{
		$payerId = Request::query('PayerID');
		$token = Request::query('token');				

		$payment = Payment::with('invoice.invoice_items')->where('transaction_reference','=',$token)->firstOrFail();
		$invoice = Invoice::with('client.account.account_gateways.gateway')->where('id', '=', $payment->invoice_id)->firstOrFail();
		$accountGateway = $invoice->client->account->account_gateways[0];
		$gateway = InvoiceController::createGateway($accountGateway);
	
		try
		{
			$details = InvoiceController::getPaymentDetails($payment->invoice);
			$response = $gateway->completePurchase($details)->send();
			$ref = $response->getTransactionReference();

			if ($response->isSuccessful())
			{
				$payment->payer_id = $payerId;
				$payment->transaction_reference = $ref;
				$payment->amount = $payment->invoice->getTotal();
				$payment->save();
				
				Session::flash('message', 'Successfully applied payment');	
				return Redirect::to('view/' . $payment->invoice->key);				
			}
			else
			{
				exit($response->getMessage());
			}
	    } 
	    catch (\Exception $e) 
	    {
			exit('Sorry, there was an error processing your payment. Please try again later.' . $e);
		}
	}


	public function edit($id)
	{
		$invoice = Invoice::with('account.country', 'client', 'invoice_items')->find($id);
		trackViewed($invoice->invoice_number . ' - ' . $invoice->client->name);
		
		$data = array(
				'account' => $invoice->account,
				'invoice' => $invoice, 
				'method' => 'PUT', 
				'url' => 'invoices/' . $id, 
				'title' => 'Edit',
				'account' => Auth::user()->account,
				'products' => Product::getProducts()->get(),
				'client' => $invoice->client,
				'clients' => Client::where('account_id','=',Auth::user()->account_id)->orderBy('name')->get());
		return View::make('invoices.edit', $data);
	}

	public function create($clientId = 0)
	{		
		$client = null;
		$invoiceNumber = Auth::user()->account->getNextInvoiceNumber();
		$account = Account::with('country')->find(Auth::user()->account_id);

		$data = array(
				'account' => $account,
				'invoice' => null, 
				'invoiceNumber' => $invoiceNumber,
				'method' => 'POST', 
				'url' => 'invoices', 
				'title' => 'New',
				'client' => $client,
				'items' => json_decode(Input::old('items')),
				'account' => Auth::user()->account,
				'products' => Product::getProducts()->get(),
				'clients' => Client::where('account_id','=',Auth::user()->account_id)->orderBy('name')->get());
		return View::make('invoices.edit', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{		
		return InvoiceController::save();
	}

	private function save($id = null)
	{	
		$rules = array(
			'client' => 'required',
			'invoice_number' => 'required',
			'invoice_date' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('invoices/create')
				->withInput()
				->withErrors($validator);
		} else {			

			$clientId = Input::get('client');

			if ($clientId == "-1") 
			{
				$client = new Client;
				$client->name = Input::get('client_name');
				$client->account_id = Auth::user()->account_id;
				$client->save();				
				$clientId = $client->id;	

				$contact = new Contact;
				$contact->email = Input::get('client_email');
				$client->contacts()->save($contact);
			}
			else
			{
				$client = Client::with('contacts')->find($clientId);				
				$contact = $client->contacts()->first();
			}

			if ($id) {
				$invoice = Invoice::find($id);
				$invoice->invoice_items()->forceDelete();
			} else {
				$invoice = new Invoice;
				$invoice->account_id = Auth::user()->account_id;
			}			
			
			$invoice->client_id = $clientId;
			$invoice->invoice_number = Input::get('invoice_number');
			$invoice->discount = 0;
			$invoice->invoice_date = toSqlDate(Input::get('invoice_date'));
			$invoice->due_date = toSqlDate(Input::get('due_date'));
			$invoice->save();

			$items = json_decode(Input::get('items'));
			foreach ($items as $item) {

				if (!isset($item->cost))
				{
					$item->cost = 0;
				}
				if (!isset($item->qty))
				{
					$item->qty = 0;
				}				

				if ($item->product_key)
				{
					$product = Product::findProduct($item->product_key);

					if (!$product)
					{
						$product = new Product;
						$product->account_id = Auth::user()->account_id;
						$product->key = $item->product_key;
					}

					$product->notes = $item->notes;
					$product->cost = $item->cost;
					$product->qty = $item->qty;
					$product->save();
				}

				$invoiceItem = new InvoiceItem;
				$invoiceItem->product_id = isset($product) ? $product->id : null;
				$invoiceItem->product_key = $item->product_key;
				$invoiceItem->notes = $item->notes;
				$invoiceItem->cost = $item->cost;
				$invoiceItem->qty = $item->qty;

				$invoice->invoice_items()->save($invoiceItem);
			}

			if (Input::get('send_email_checkBox')) 
			{
				$data = array('link' => URL::to('view') . '/' . $invoice->invoice_key);
				/*
				Mail::send(array('html'=>'emails.invoice_html','text'=>'emails.invoice_text'), $data, function($message) use ($contact)
				{
				    $message->from('hillelcoren@gmail.com', 'Hillel Coren');
				    $message->to($contact->email);
				});
				*/

				$invitation = new Invitation;
				$invitation->invoice_id = $invoice->id;
				$invitation->user_id = Auth::user()->id;
				$invitation->contact_id = $contact->id;
				$invitation->key = str_random(20);				
				$invitation->save();

				Session::flash('message', 'Successfully emailed invoice');
			} else {				
				Session::flash('message', 'Successfully saved invoice');
			}

			$url = 'invoices/' . $invoice->id . '/edit';
			processedRequest($url);
			return Redirect::to($url);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Redirect::to('invoices/'.$id.'/edit');

		//$invoice = Invoice::find($id);
		//return View::make('invoices.show')->with('invoice', $invoice);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return InvoiceController::save($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function bulk()
	{
		$action = Input::get('action');
		$ids = Input::get('ids');
		$invoices = Invoice::find($ids);

		foreach ($invoices as $invoice) {
			if ($action == 'archive') {
				$invoice->delete();
			} else if ($action == 'delete') {
				$invoice->forceDelete();
			} 
		}

		$message = pluralize('Successfully '.$action.'d ? invoice', count($ids));
		Session::flash('message', $message);

		return Redirect::to('invoices');
	}

	public function archive($id)
	{
		$invoice = Invoice::find($id);
		$invoice->delete();

		Session::flash('message', 'Successfully archived invoice ' . $invoice->invoice_number);
		return Redirect::to('invoices');		
	}

	public function delete($id)
	{
		$invoice = Invoice::find($id);
		$invoice->forceDelete();

		Session::flash('message', 'Successfully deleted invoice ' . $invoice->invoice_number);
		return Redirect::to('invoices');		
	}
}