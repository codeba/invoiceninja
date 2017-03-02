<?php

namespace App\Http\Requests;

use App\Models\ExpenseCategory;

class ExpenseRequest extends EntityRequest
{
    protected $entityType = ENTITY_EXPENSE;

    public function entity()
    {
        $expense = parent::entity();

        // eager load the documents
        if ($expense && ! $expense->relationLoaded('documents')) {
            $expense->load('documents');
        }

        return $expense;
    }

    public function sanitize()
    {
        $input = $this->all();

        if ($this->expense_category_id == '-1' && $this->user()->can('create', ENTITY_EXPENSE_CATEGORY)) {
            $category = app('App\Ninja\Repositories\ExpenseCategoryRepository')->save([
                'name' => $this->expense_category_name,
            ]);
            $input['expense_category_id'] = $category->id;
        } elseif ($this->expense_category_id) {
            $input['expense_category_id'] = ExpenseCategory::getPrivateId($this->expense_category_id);
        }

        if ($this->vendor_id == '-1' && $this->user()->can('create', ENTITY_VENDOR)) {
            $vendor = app('App\Ninja\Repositories\VendorRepository')->save([
                'name' => $this->vendor_name,
            ]);
            $input['vendor_id'] = $vendor->public_id;
        }

        $this->replace($input);

        return $this->all();
    }
}
