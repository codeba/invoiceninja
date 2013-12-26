<?php namespace ninja\repositories;

use Client;
use Contact;

class AccountRepository
{
	public function getSearchData()
	{
    	$clients = \DB::table('clients')
			->where('clients.deleted_at', '=', null)
			->select(\DB::raw("'Clients' as type, clients.public_id, clients.name"));

		$contacts = \DB::table('clients')
			->join('contacts', 'contacts.client_id', '=', 'clients.id')
			->where('clients.deleted_at', '=', null)
			->select(\DB::raw("'Contacts' as type, clients.public_id, CONCAT(contacts.first_name, ' ', contacts.last_name) as name"));

		$invoices = \DB::table('clients')
			->join('invoices', 'invoices.client_id', '=', 'clients.id')
			->where('clients.deleted_at', '=', null)
			->where('invoices.deleted_at', '=', null)
			->select(\DB::raw("'Invoices' as type, invoices.public_id, CONCAT(invoices.invoice_number, ': ', clients.name) as name"));


		$data = [];

		foreach ($clients->union($contacts)->union($invoices)->get() as $row)
		{
			if (!isset($data[$row->type]))
			{
				$data[$row->type] = [];	
			}

			$data[$row->type][] = [
				'value' => $row->name,
				'public_id' => $row->public_id
			];
		}

    	return $data;
	}
}