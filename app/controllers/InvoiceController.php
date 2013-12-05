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
			'title' => '- Invoices',
			'columns'=>['checkbox', 'Invoice Number', 'Client', 'Total', 'Amount Due', 'Invoice Date', 'Due Date', 'Status', 'Action']
		));
	}

	public function getDatatable($clientPublicId = null)
    {
    	$query = DB::table('invoices')
    				->join('clients', 'clients.id', '=','invoices.client_id')
					->join('invoice_statuses', 'invoice_statuses.id', '=', 'invoices.invoice_status_id');
					//->select('clients.public_id as client_public_id', 'invoice_number', 'clients.name', 'invoices.public_id', 'total', 'invoices.balance', 'invoice_date', 'due_date');
		//dd($query->get());

    	if ($clientPublicId) {
    		$query->where('clients.public_id', '=', $clientPublicId);
    		//$clientId = Client::getPrivateId($clientPublicId);
    		//$collection->where('client_id','=',$clientId);
    	}

    	$table = Datatable::query($query);
			

    	if (!$clientPublicId) {
    		$table->addColumn('checkbox', function($model) { return '<input type="checkbox" name="ids[]" value="' . $model->public_id . '">'; });
    	}
    	
    	$table->addColumn('invoice_number', function($model) { return link_to('invoices/' . $model->public_id . '/edit', $model->invoice_number); });

    	if (!$clientPublicId) {
    		//$table->addColumn('client', function($model) { dd($model); return link_to('clients/' . $model->client_public_id, $model->client_name); });
    	}
    	
    	return $table->addColumn('total', function($model){ return '$' . money_format('%i', $model->total); })
    		->addColumn('invoices.balance', function($model) { return '$' . money_format('%i', $model->balance); })
    	    ->addColumn('invoice_date', function($model) { return fromSqlDate($model->invoice_date); })
    	    ->addColumn('due_date', function($model) { return fromSqlDate($model->due_date); })
    	    //->addColumn('status', function($model) { return $model->invoice_status->name; })
    	    ->addColumn('dropdown', function($model) 
    	    { 
    	    	return '<div class="btn-group tr-action" style="display:none">
  							<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
    							Select <span class="caret"></span>
  							</button>
  							<ul class="dropdown-menu" role="menu">
						    <li><a href="' . URL::to('invoices/'.$model->public_id.'/edit') . '">Edit Invoice</a></li>
						    <li class="divider"></li>
						    <li><a href="' . URL::to('invoices/'.$model->public_id.'/archive') . '">Archive Invoice</a></li>
						    <li><a href="javascript:deleteEntity(' . $model->public_id . ')">Delete Invoice</a></li>						    
						  </ul>
						</div>';
    	    })    	       	    
    	    ->orderColumns('number')
    	    ->make();    	
    }


	public function view($invitationKey)
	{
		$invitation = Invitation::with('user', 'invoice.account', 'invoice.invoice_items', 'invoice.client.account.account_gateways')
			->where('invitation_key', '=', $invitationKey)->firstOrFail();				
		
		$user = $invitation->user;		
		$invoice = $invitation->invoice;
		
		$now = Carbon::now()->toDateTimeString();

		$invitation->viewed_date = $now;
		$invitation->save();

		$client = $invoice->client;
		$client->last_login = $now;
		$client->save();

		Activity::viewInvoice($invitation);

		return View::make('invoices.view')->with('invoice', $invoice);	
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

	public function show_payment($invitationKey)
	{
		$invoice = Invoice::with('invoice_items', 'client.account.account_gateways.gateway')->where('invitation_key', '=', $invitationKey)->firstOrFail();
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


	public function edit($publicId)
	{
		$invoice = Invoice::scope($publicId)->with('account.country', 'client', 'invoice_items')->firstOrFail();
		trackViewed($invoice->invoice_number . ' - ' . $invoice->client->name);
		
		$data = array(
				'account' => $invoice->account,
				'invoice' => $invoice, 
				'method' => 'PUT', 
				'url' => 'invoices/' . $publicId, 
				'title' => '- ' . $invoice->invoice_number,
				'account' => Auth::user()->account,
				'products' => Product::scope()->get(array('product_key','notes','cost','qty')),
				'client' => $invoice->client,
				'clients' => Client::scope()->orderBy('name')->get());
		return View::make('invoices.edit', $data);
	}

	public function create($clientPublicId = 0)
	{		
		$client = null;
		$invoiceNumber = Auth::user()->account->getNextInvoiceNumber();
		$account = Account::with('country')->findOrFail(Auth::user()->account_id);

		if ($clientPublicId) {
			$client = Client::scope($clientPublicId)->firstOrFail();
        }

		$data = array(
				'account' => $account,
				'invoice' => null, 
				'invoiceNumber' => $invoiceNumber,
				'method' => 'POST', 
				'url' => 'invoices', 
				'title' => '- New Invoice',
				'client' => $client,
				'items' => json_decode(Input::old('items')),
				'account' => Auth::user()->account,
				'products' => Product::scope()->get(array('product_key','notes','cost','qty')),
				'clients' => Client::scope()->orderBy('name')->get());
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

	private function save($publicId = null)
	{	
		$action = Input::get('action');

		if ($action == 'archive')
		{
			return InvoiceController::archive($publicId);
		}
		else if ($action == 'delete')
		{
			return InvoiceController::delete($publicId);
		}

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

			$clientPublicId = Input::get('client');

			if ($clientPublicId == "-1") 
			{
				$client = Client::createNew();
				$client->name = Input::get('client_name');
				$client->save();				
				$clientId = $client->id;	

				$contact = Contact::createNew();
				$contact->email = Input::get('client_email');
				$client->contacts()->save($contact);
			}
			else
			{
				$client = Client::scope($clientPublicId)->with('contacts')->firstOrFail();
				$contact = $client->contacts()->first();
			}

			if ($publicId) {
				$invoice = Invoice::scope($publicId)->firstOrFail();
				$invoice->invoice_items()->forceDelete();
			} else {
				$invoice = Invoice::createNew();			
			}			
			
			$invoice->invoice_number = Input::get('invoice_number');
			$invoice->discount = 0;
			$invoice->invoice_date = toSqlDate(Input::get('invoice_date'));
			$invoice->due_date = toSqlDate(Input::get('due_date'));			
			$invoice->notes = Input::get('notes');
			$client->invoices()->save($invoice);
			
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

				if (!$item->cost && !$item->qty && !$item->product_key && !$item->notes)
				{
					continue;
				}

				if ($item->product_key)
				{
					$product = Product::findProductByKey($item->product_key);

					if (!$product)
					{
						$product = Product::createNew();						
						$product->product_key = $item->product_key;
					}

					/*
					$product->notes = $item->notes;
					$product->cost = $item->cost;
					$product->qty = $item->qty;
					*/
					
					$product->save();
				}

				$invoiceItem = InvoiceItem::createNew();
				$invoiceItem->product_id = isset($product) ? $product->id : null;
				$invoiceItem->product_key = $item->product_key;
				$invoiceItem->notes = $item->notes;
				$invoiceItem->cost = $item->cost;
				$invoiceItem->qty = $item->qty;

				$invoice->invoice_items()->save($invoiceItem);
			}

			if ($action == 'email') 
			{
				$data = array('link' => URL::to('view') . '/' . $invoice->invoice_key);
				/*
				Mail::send(array('html'=>'emails.invoice_html','text'=>'emails.invoice_text'), $data, function($message) use ($contact)
				{
				    $message->from('hillelcoren@gmail.com', 'Hillel Coren');
				    $message->to($contact->email);
				});
				*/

				$invitation = Invitation::createNew();
				$invitation->invoice_id = $invoice->id;
				$invitation->user_id = Auth::user()->id;
				$invitation->contact_id = $contact->id;
				$invitation->invitation_key = str_random(20);				
				$invitation->save();

				Session::flash('message', 'Successfully emailed invoice');
			} else {				
				Session::flash('message', 'Successfully saved invoice');
			}

			$url = 'invoices/' . $invoice->public_id . '/edit';
			return Redirect::to($url);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($publicId)
	{
		return Redirect::to('invoices/'.$publicId.'/edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($publicId)
	{
		return InvoiceController::save($publicId);
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
		$invoices = Invoice::scope($ids)->get();

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
