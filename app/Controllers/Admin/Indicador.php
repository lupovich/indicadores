<?php

namespace App\Controllers\Admin;

use App\Models\IndicadorModel;
use App\Libraries\DataTableLib;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Indicador extends BaseController
{

    use ResponseTrait;
    protected $format    = 'json';

    public function index()
    {
        $model = new IndicadorModel();

        $fecha_minima = $model->getFechaMinima();
        $fecha_maxima = $model->getFechaMaxima();

        $fechas = [ 
            'fecha_minima' => $fecha_minima, 
            'fecha_maxima' => $fecha_maxima 
        ]; 
        
        //var_dump($fechas);

        return view('dashboard', $fechas);
        
    }

    public function list()
    {
        
        $model = model('IndicadorModel');
        
        $columns = [
            'id', 'nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador'
        ];
        
        $customDataTable = new DataTableLib($model, 'group', $columns);
        
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

    public function show($id)
    {
        $model = new IndicadorModel();
        $indicador = $model->where('id', $id)->first();

        if ($indicador) 
        {            
            return $this->respond($indicador, 200);

        } else {
            return $this->respond(['error' => 'No se encontró ningún indicador con ese id.'.$id], 404);
        }        
    }

    public function create()
    {
        $model = new IndicadorModel();
        $data = [
            'nombreIndicador' => $this->request->getVar('nombreIndicador'),
            'codigoIndicador'  => $this->request->getVar('codigoIndicador'),
            'unidadMedidaIndicador'  => $this->request->getVar('unidadMedidaIndicador'),
            'valorIndicador'  => $this->request->getVar('valorIndicador'),
            'fechaIndicador'  => $this->request->getVar('fechaIndicador'),
        ];
        $indicador = $model->save($data); //Guarda o actualiza el indicador seleccionado
        
        if ($indicador) 
        {
            return $this->respond(['success' => 'El indicador se ha guardado correctamente'], 200);

        } else {
            return $this->respond(['error' => 'No se ha guardado el indicador'], 404);
        }
    }

    public function delete($id)
    {
        $model = new IndicadorModel();
        $indicador = $model->where('id', $id)->delete($id);

        if ($indicador) 
        {
            return $this->respond(['success' => 'El indicador se ha eliminado correctamente'], 200);

        } else {
            return $this->respond(['error' => 'No se encontró ningún indicador con ese id.'.$id], 404);
        }
    }

    public function reporte()
    {
        $desde = $this->request->uri->getSegment(3); 
        $hasta = $this->request->uri->getSegment(4);   
        
        $model = new IndicadorModel();
        
        $reporte = $model->getReport($desde, $hasta);
        
        //var_dump($reporte);

        if ($reporte) 
        {
            return $this->response->setJSON($reporte);
        }
    }

}
