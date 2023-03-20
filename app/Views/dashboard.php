<?= $this->extend('templates/main'); ?>

<?= $this->section('contentCrud'); ?>

<div class="row">
  <div class="card col">
      <div class="card-body">
          <h4 class="card-title">Indicador</h4>
          <div class="container">              
            <form id="indicadoresForm">
            <!-- Nombre de indicador -->
            <div class="form-group">
                <input type="text" name="nombreIndicador" id="nombreIndicador" value="<?= set_value('nombreIndicador') ?>" class="form-control mt-2">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <!-- Código de indicador -->
            <div class="form-group">
                <input type="text" name="codigoIndicador" id="codigoIndicador" value="<?= set_value('codigoIndicador') ?>" class="form-control mt-2">
            </div>
            <!-- Unidad de medida de indicador -->
            <div class="form-group">
                <input type="text" name="unidadMedidaIndicador" id="unidadMedidaIndicador" value="<?= set_value('unidadMedidaIndicador') ?>" class="form-control mt-2">
            </div>
            <!-- Valor de indicador -->
            <div class="form-group">
                <input type="text" name="valorIndicador" id="valorIndicador" value="<?= set_value('valorIndicador') ?>" class="form-control mt-2">
            </div>
            <!-- Fecha de indicador -->
            <div class="form-group">
                <input type="date" name="fechaIndicador" id="fechaIndicador" value="<?= set_value('fechaIndicador') ?>" class="form-control mt-2"> 
            </div> 
            <div class="form-group"> 
                <input type="submit" name="submit" value="Guardar" class="tn btn-primary mt-2"> 
            </div> 
            </form>
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
