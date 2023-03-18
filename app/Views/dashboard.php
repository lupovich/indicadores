<?= $this->extend('templates/main'); ?>

<?= $this->section('contentCrud'); ?>

<div class="row">
  <div class="card col">
      <div class="card-body">
          <h4 class="card-title">Indicador</h4>
          <div class="container">
              <?= form_open('indicador/create') ?>
                  <!-- Nombre de indicador -->
                  <div class="form-group">
                      <?= form_input('nombreIndicador', set_value('nombreIndicador'), ['id' => 'nombreIndicador', 'class' => 'form-control mt-2']) ?>
                      <small id="helpId" class="text-muted">Help text</small>
                  </div>
                  <!-- Código de indicador -->
                  <div class="form-group">
                      <?= form_input('codigoIndicador', set_value('codigoIndicador'), ['id' => 'codigoIndicador', 'class' => 'form-control mt-2']) ?>
                  </div>
                  <!-- Unidad de medida de indicador -->
                  <div class="form-group">
                      <?= form_input('unidadMedidaIndicador', set_value('unidadMedidaIndicador'), ['id' => 'unidadMedidaIndicador', 'class' => 'form-control mt-2']) ?>
                  </div>
                  <!-- Valor de indicador -->
                  <div class="form-group">
                      <?= form_input('valorIndicador', set_value('valorIndicador'), ['id' => 'valorIndicador', 'class' => 'form-control mt-2']) ?>
                  </div>
                  <!-- Fecha de indicador -->
                  <div class="form-group">
                      <?= form_input(['type' => 'date', 'name' => 'fechaIndicador', 'value' => set_value('fechaIndicador'), 'id' => 'fechaIndicador', 'class' => 'form-control mt-2']) ?>
                  </div>
                  <div class="form-group">
                      <?= form_submit('submit', 'Guardar', ['class' => 'btn btn-primary mt-2']) ?>
                  </div>
              <?= form_close() ?>                 
          </div>
      </div>
  </div>  
  <div class="col-8">
    <div class="table-responsive">
      <table id="indicadores" class="table table-striped table-sm display w-100">
          <thead>
          <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Código</th>
              <th>Unidad</th>
              <th>Valor</th>
              <th>Fecha</th>
              <th></th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>  
</div>

<?= $this->endSection(); ?>

<?= $this->section('contentChart'); ?>

<h2>Section title</h2>
  <canvas class="my-4 w-100" id="indicadorChart" width="900" height="380"></canvas>

<?= $this->endSection(); ?>
