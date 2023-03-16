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
        /*$data = json_decode('
        {
          "draw": 1,
          "recordsTotal": 57,
          "recordsFiltered": 57,
          "data": [
            {
              "id": "876",
              "nombreIndicador": "Satou",
              "codigoIndicador": "Accountant",
              "unidadMedidaIndicador": "Tokyo",
              "valorIndicador": "$162,700",
              "fechaIndicador": "28th Nov 08"
            }]
        }');*/ 
    
        $order = $this->request->getVar('order');
        $order = array_shift($order);
        
        $model = model('IndicadorModel');

        $columns = [
            'id', 'nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador'
        ];

        $customDataTable = new DataTableLib($model, 'group', $columns);

        //http://localhost:8080/admin/importar?draw=1&length=10&start=0&order%5B0%5D%5Bcolumn%5D=0&order%5B0%5D%5Bdir%5D=asc


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
