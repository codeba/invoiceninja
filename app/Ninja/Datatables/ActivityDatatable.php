<?php namespace App\Ninja\Datatables;

use Utils;
use URL;
use Auth;

class ActivityDatatable extends EntityDatatable
{
    public $entityType = ENTITY_ACTIVITY;

    public function columns()
    {
        return [
            [
                'activities.id',
                function ($model) {
                    return Utils::timestampToDateTimeString(strtotime($model->created_at));
                }
            ],
            [
                'activity_type_id',
                function ($model) {
                    $data = [
                        'client' => link_to('/clients/' . $model->client_public_id, Utils::getClientDisplayName($model))->toHtml(),
                        'user' => $model->is_system ? '<i>' . trans('texts.system') . '</i>' : Utils::getPersonDisplayName($model->user_first_name, $model->user_last_name, $model->user_email),
                        'invoice' => $model->invoice ? link_to('/invoices/' . $model->invoice_public_id, $model->is_recurring ? trans('texts.recurring_invoice') : $model->invoice)->toHtml() : null,
                        'quote' => $model->invoice ? link_to('/quotes/' . $model->invoice_public_id, $model->invoice)->toHtml() : null,
                        'contact' => $model->contact_id ? link_to('/clients/' . $model->client_public_id, Utils::getClientDisplayName($model))->toHtml() : Utils::getPersonDisplayName($model->user_first_name, $model->user_last_name, $model->user_email),
                        'payment' => $model->payment ?: '',
                        'credit' => $model->payment_amount ? Utils::formatMoney($model->credit, $model->currency_id, $model->country_id) : '',
                        'payment_amount' => $model->payment_amount ? Utils::formatMoney($model->payment_amount, $model->currency_id, $model->country_id) : null,
                        'adjustment' => $model->adjustment ? Utils::formatMoney($model->adjustment, $model->currency_id, $model->country_id) : null
                    ];

                    return trans("texts.activity_{$model->activity_type_id}", $data);
                }
            ],
            [
                'balance',
                function ($model) {
                    return Utils::formatMoney($model->balance, $model->currency_id, $model->country_id);
                }
            ],
            [
                'adjustment',
                function ($model) {
                    return $model->adjustment != 0 ? Utils::wrapAdjustment($model->adjustment, $model->currency_id, $model->country_id) : '';
                }
            ]
        ];
    }
}
