<?php namespace App\Ninja\Datatables;

class EntityDatatable
{
    public $entityType;
    public $isBulkEdit;
    public $hideClient;
    public $sortCol = 1;

    public function __construct($isBulkEdit = true, $hideClient = false, $entityType = false)
    {
        $this->isBulkEdit = $isBulkEdit;
        $this->hideClient = $hideClient;

        if ($entityType) {
            $this->entityType = $entityType;
        }
    }

    public function columns()
    {
        return [];
    }

    public function actions()
    {
        return [];
    }

    public function columnFields()
    {
        $data = [];
        $columns = $this->columns();

        if ($this->isBulkEdit) {
            $data[] = 'checkbox';
        }

        foreach ($columns as $column) {
            if (count($column) == 3) {
                // third column is optionally used to determine visibility
                if (!$column[2]) {
                    continue;
                }
            }
            $data[] = $column[0];
        }

        $data[] = '';

        return $data;
    }
}
