<?php

namespace App\Libraries;

use CodeIgniter\Model;

class DataTableLib
{

    private $model;
    private $group;
    private $columns;

    public function __construct(Model $model, string $group, array $columns)
    {
        $this->model = $model;
        $this->group = $group;
        $this->columns = $columns;
    }

    public function getResponse(array $params)
    {
        [
            'draw' => $draw,
            'length' => $length,
            'start' => $start,
            'order' => $order,
            'order' => $direction,
            'search' => $search
        ] = $params;

        //Paginación 

        $page = ceil(($start - 1) / ($length + 1));

        if (!empty($search)) {
            $this->applyFilters($search);
        }

        //$users = $userModel->paginate(10, 'group1', $page);

        $data = $this->model
                ->orderBy($this->getColumn($order), $direction)
                ->paginate($length, $this->group, $page);
        
        //dd($data);

        return [
            "draw" => $draw,
            "recordsTotal" =>  $this->model->countAll(),
            "recordsFiltered" =>  $this->model->pager->getTotal($this->group),
            "data" => $data,
        ];

    }

    private function applyFilters(string $match)
    {
        foreach ($this->columns as $column) {
            $this->model->orLike($column, $match);
        }
    }

    private function getColumn($index)
    {
        return $this->columns[$index];
    }

}

