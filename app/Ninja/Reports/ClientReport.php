<?php

namespace App\Ninja\Reports;

use App\Models\Client;
use Auth;

class ClientReport extends AbstractReport
{
    public function getColumns()
    {
        $columns = [
            'client' => [],
            'amount' => [],
            'paid' => [],
            'balance' => [],
            'public_notes' => ['columnSelector-false'],
            'private_notes' => ['columnSelector-false'],
        ];

        $user = auth()->user();
        $account = $user->account;

        if ($account->custom_client_label1) {
            $columns[$account->custom_client_label1] = ['columnSelector-false', 'custom'];
        }
        if ($account->custom_client_label2) {
            $columns[$account->custom_client_label2] = ['columnSelector-false', 'custom'];
        }

        return $columns;
    }

    public function run()
    {
        $account = Auth::user()->account;

        $clients = Client::scope()
                        ->orderBy('name')
                        ->withArchived()
                        ->with('contacts')
                        ->with(['invoices' => function ($query) {
                            $query->where('invoice_date', '>=', $this->startDate)
                                  ->where('invoice_date', '<=', $this->endDate)
                                  ->where('invoice_type_id', '=', INVOICE_TYPE_STANDARD)
                                  ->where('is_recurring', '=', false)
                                  ->withArchived();
                        }]);

        foreach ($clients->get() as $client) {
            $amount = 0;
            $paid = 0;

            foreach ($client->invoices as $invoice) {
                $amount += $invoice->amount;
                $paid += $invoice->getAmountPaid();
            }

            $row = [
                $this->isExport ? $client->getDisplayName() : $client->present()->link,
                $account->formatMoney($amount, $client),
                $account->formatMoney($paid, $client),
                $account->formatMoney($amount - $paid, $client),
                $client->public_notes,
                $client->private_notes,
            ];

            if ($account->custom_client_label1) {
                $row[] = $client->custom_value1;
            }
            if ($account->custom_client_label2) {
                $row[] = $client->custom_value2;
            }

            $this->data[] = $row;

            $this->addToTotals($client->currency_id, 'amount', $amount);
            $this->addToTotals($client->currency_id, 'paid', $paid);
            $this->addToTotals($client->currency_id, 'balance', $amount - $paid);
        }
    }
}
