<?php namespace App\Ninja\Repositories;

use App\Ninja\Repositories\BaseRepository;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Activity;

class ClientRepository extends BaseRepository
{
    public function getClassName()
    {
        return 'App\Models\Client';
    }

    public function find($filter = null)
    {
        $query = \DB::table('clients')
                    ->join('contacts', 'contacts.client_id', '=', 'clients.id')
                    ->where('clients.account_id', '=', \Auth::user()->account_id)
                    ->where('contacts.is_primary', '=', true)
                    ->where('contacts.deleted_at', '=', null)
                    ->select('clients.public_id', 'clients.name', 'contacts.first_name', 'contacts.last_name', 'clients.balance', 'clients.last_login', 'clients.created_at', 'clients.work_phone', 'contacts.email', 'clients.currency_id', 'clients.deleted_at', 'clients.is_deleted');

        if (!\Session::get('show_trash:client')) {
            $query->where('clients.deleted_at', '=', null);
        }

        if ($filter) {
            $query->where(function ($query) use ($filter) {
                $query->where('clients.name', 'like', '%'.$filter.'%')
                      ->orWhere('contacts.first_name', 'like', '%'.$filter.'%')
                      ->orWhere('contacts.last_name', 'like', '%'.$filter.'%')
                      ->orWhere('contacts.email', 'like', '%'.$filter.'%');
            });
        }

        return $query;
    }
    
    public function save($data)
    {
        $publicId = isset($data['public_id']) ? $data['public_id'] : false;

        if (!$publicId || $publicId == '-1') {
            $client = Client::createNew();
        } else {
            $client = Client::scope($publicId)->with('contacts')->firstOrFail();
        }

        $client->fill($data);
        $client->save();

        $first = true;
        $contacts = isset($data['contact']) ? [$data['contact']] : $data['contacts'];
        $contactIds = [];

        foreach ($contacts as $contact) {
            $contact = $client->addContact($contact, $first);
            $contactIds[] = $contact->public_id;
            $first = false;
        }

        foreach ($client->contacts as $contact) {
            if (!in_array($contact->public_id, $contactIds)) {
                $contact->delete();
            }
        }

        return $client;
    }
}
