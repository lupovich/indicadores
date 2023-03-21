<?php

namespace App\Models;

use CodeIgniter\Model;

class IndicadorModel extends Model
{
    protected $table      = 'indicadores';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nombreIndicador', 
        'codigoIndicador', 
        'unidadMedidaIndicador', 
        'valorIndicador', 
        'fechaIndicador'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nombreIndicador'           => 'required|is_unique[indicadores.id]', 
        'codigoIndicador'           => 'required|min_length[1]', 
        'unidadMedidaIndicador'     => 'required|min_length[1]', 
        'valorIndicador'            => 'required|decimal',
        'fechaIndicador'            => 'required|min_length[1]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function insertBatch(?array $data = NULL, ?bool $escape = NULL, int $batchSize = 100, bool $testing = false)
    {
        // Inserta un array de datos en la tabla usando el método insertBatch() de la clase Model
        return parent::insertBatch($data, $escape, $batchSize, $testing);
    }

    public function getFechaMinima()
    {
        $result = $this->selectMin('fechaIndicador', 'fecha_minima')->first();

        if ($result) 
        {
            return $result['fecha_minima'];
        }
    }

    public function getFechaMaxima()
    {
        $result = $this->selectMax('fechaIndicador', 'fecha_maxima')->first();

        if ($result) 
        {
            return $result['fecha_maxima'];
        }
    }

    public function getReport($desde, $hasta) 
    {
        $desde = date("Y-m-d", strtotime($desde));
        $hasta = date("Y-m-d", strtotime($hasta));
        
        //var_dump($desde);

        $query = $this->db->table("indicadores")
                          ->select("codigoIndicador, SUM(valorIndicador) AS totalValorIndicador")
                          ->where("fechaIndicador >=", $desde)
                          ->where("fechaIndicador <=", $hasta)
                          ->groupBy("codigoIndicador")
                          ->get();

        return $query->getResultArray();        
    }

}