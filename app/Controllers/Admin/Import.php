<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\DataTableLib;
use CodeIgniter\API\ResponseTrait;


class Import extends BaseController
{
  use ResponseTrait;

  protected $modelName = 'App\Models\IndicadorModel';
  protected $format    = 'json';


  public function index()
  {
    return "Import Data";
  }
}