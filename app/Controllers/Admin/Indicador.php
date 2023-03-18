<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\DataTableLib;
use CodeIgniter\API\ResponseTrait;

class Indicador extends BaseController
{

    use ResponseTrait;

    protected $modelName = 'App\Models\IndicadorModel';
    protected $format    = 'json';


    public function index()
    {
        return view('dashboard');
    }

    public function list()
    {
        
        $model = model('IndicadorModel');

        $columns = [
            'id', 'nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador'
        ];

        $customDataTable = new DataTableLib($model, 'group', $columns);

        //http://localhost:8080/admin/importar?draw=1&length=10&start=0&order%5B0%5D%5Bcolumn%5D=0&order%5B0%5D%5Bdir%5D=asc

        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $response = $customDataTable->getResponse([
            'draw' => $this->request->getVar('draw'),
            'length' => $this->request->getVar('length'),
            'start' => $this->request->getVar('start'),
            'order' => $order['column'],
            'direction' => $order['dir'],
            'search' => $this->request->getVar('search')['value']
        ]);

        return $this->respond($response);

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
