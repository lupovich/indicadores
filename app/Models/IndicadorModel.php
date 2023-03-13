<?php

namespace App\Models;

use CodeIgniter\Model;

class IndicadorModel extends Model
{
    protected $table      = 'indicadores';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

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

}