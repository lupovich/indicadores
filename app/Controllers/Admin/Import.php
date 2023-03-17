<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Import extends BaseController
{
  use ResponseTrait;

  protected $modelName = 'App\Models\IndicadorModel';
  protected $format    = 'json';


  public function index()
  {
    
    $csv = $this->request->getPost('csv');

    file_put_contents('assets/csv/indicadores.csv', $csv);

    console.log("Datos guardados correctamente");

    $this->importar();

  }

  public function importar()
  {
    
    $model = new \App\Models\IndicadorModel();

    $file = fopen('assets/csv/indicadores.csv', 'r');

    $data = [];

    while (($row = fgetcsv($file)) !== false) 
    {
      $data[] = [
        'nombreIndicador' => $row[0],
        'codigoIndicador' => $row[1],
        'unidadMedidaIndicador' => $row[2],
        'valorIndicador' => $row[3],
        'fechaIndicador' => $row[4]
      ];
    }

    fclose($file);

    if ($model->insertBatch($data)) {
      console.log("Datos importados correctamente");
    return;

    }
  }
}