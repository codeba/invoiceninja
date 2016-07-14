<?php

namespace App\Ninja\Datatables;

use Utils;
use URL;
use Auth;

/**
 * Class VendorDatatable
 */
class VendorDatatable extends EntityDatatable
{
    public $entityType = ENTITY_VENDOR;

    /**
     * @return array
     */
    public function columns()
    {
        return [
            [
                'name',
                function ($model) {
                    return link_to("vendors/{$model->public_id}", $model->name ?: '')->toHtml();
                }
            ],
            [
                'city',
                function ($model) {
                    return $model->city;
                }
            ],
            [
                'work_phone',
                function ($model) {
                    return $model->work_phone;
                }
            ],
            [
                'email',
                function ($model) {
                    return link_to("vendors/{$model->public_id}", $model->email ?: '')->toHtml();
                }
            ],
            [
                'vendors.created_at',
                function ($model) {
                    return Utils::timestampToDateString(strtotime($model->created_at));
                }
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            [
                trans('texts.edit_vendor'),
                function ($model) {
                    return URL::to("vendors/{$model->public_id}/edit");
                },
                function ($model) {
                    return Auth::user()->can('editByOwner', [ENTITY_VENDOR, $model->user_id]);
                }
            ],
            [
                '--divider--', function(){return false;},
                function ($model) {
                    return Auth::user()->can('editByOwner', [ENTITY_VENDOR, $model->user_id]) && Auth::user()->can('create', ENTITY_EXPENSE);
                }

            ],
            [
                trans('texts.enter_expense'),
                function ($model) {
                    return URL::to("expenses/create/{$model->public_id}");
                },
                function ($model) {
                    return Auth::user()->can('create', ENTITY_EXPENSE);
                }
            ]
        ];
    }
}
