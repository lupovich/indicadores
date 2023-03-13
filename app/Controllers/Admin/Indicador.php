<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Indicador extends BaseController
{

    protected $modelName = 'App\Models\IndicadorModel';
    protected $format    = 'json';


    public function import()
    {
        return "Import data";
    }

    public function index()
    {
        return "Index";
    }    

    public function create()
    {
        return "Create";
    }

    public function store()
    {
        return "Store";
    }

    public function show($id)
    {
        return "$id";
    }

    public function edit($id)
    {
        return "$id";
    }

    public function update($id)
    {
        return "$id";
    }

    public function destroy($id)
    {
        return "$id";
    }
}
