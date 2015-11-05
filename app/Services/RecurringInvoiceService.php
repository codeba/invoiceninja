<?php namespace App\Services;

use URL;
use Utils;
use App\Ninja\Repositories\InvoiceRepository;

class RecurringInvoiceService extends BaseService
{
    protected $invoiceRepo;
    protected $datatableService;

    public function __construct(InvoiceRepository $invoiceRepo, DatatableService $datatableService)
    {
        $this->invoiceRepo = $invoiceRepo;
        $this->datatableService = $datatableService;
    }

    public function getDatatable($accountId, $clientPublicId = null, $entityType, $search)
    {
        $query = $this->invoiceRepo->getRecurringInvoices($accountId, $clientPublicId, $search);

        return $this->createDatatable(ENTITY_RECURRING_INVOICE, $query, !$clientPublicId);
    }

    protected function getDatatableColumns($entityType, $hideClient)
    {
        return [
            [
                'frequency',
                function ($model) {
                    return link_to("invoices/{$model->public_id}", $model->frequency);
                }
            ],
            [
                'client_name',
                function ($model) {
                    return link_to("clients/{$model->client_public_id}", Utils::getClientDisplayName($model));
                },
                ! $hideClient
            ],
            [
                'start_date',
                function ($model) {
                    return Utils::fromSqlDate($model->start_date);
                }
            ],
            [
                'end_date',
                function ($model) {
                    return Utils::fromSqlDate($model->end_date);
                }
            ],
            [
                'amount',
                function ($model) {
                    return Utils::formatMoney($model->amount, $model->currency_id);
                }
            ]
        ];
    }

    protected function getDatatableActions($entityType)
    {
        return [
            [
                trans('texts.edit_invoice'),
                function ($model) {
                    return URL::to("invoices/{$model->public_id}/edit");
                }
            ]
        ];
    }
}