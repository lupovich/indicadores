<?= $this->extend('templates/main'); ?>

<?= $this->section('contentCrud'); ?>

<div class="row">
  <div class="card col">
      <div class="card-body">
          <h4 class="card-title">Indicador</h4>
          <div class="container">              
              <?php $validation = \Config\Services::validation(); ?>
              
              <form id="indicadoresForm">
            
            <!-- Nombre de indicador -->
            <div class="form-group">
                <input type="text" name="nombreIndicador" id="nombreIndicador" value="<?= set_value('nombreIndicador') ?>" class="form-control mt-2" placeholder="Nombre" required>
                
                <?php if( $validation->getError('nombreIndicador') ):?>

                    <small id="helpId" class="text-danger"><?= $validation->getError('nombreIndicador'); ?></small>

                <?php endif ?>
            </div>
            <!-- Código de indicador -->
            <div class="form-group">
                <input type="text" name="codigoIndicador" id="codigoIndicador" value="<?= set_value('codigoIndicador') ?>" class="form-control mt-2" placeholder="Código" required>

                <?php if( $validation->getError('codigoIndicador') ):?>

                    <small id="helpId" class="text-danger"><?= $validation->getError('codigoIndicador'); ?></small>

                <?php endif ?>
            </div>
            <!-- Unidad de medida de indicador -->
            <div class="form-group">
                <input type="text" name="unidadMedidaIndicador" id="unidadMedidaIndicador" value="<?= set_value('unidadMedidaIndicador') ?>" class="form-control mt-2" placeholder="Unidad de medida" required>

                <?php if( $validation->getError('unidadMedidaIndicador') ):?>

                    <small id="helpId" class="text-danger"><?= $validation->getError('unidadMedidaIndicador'); ?></small>

                <?php endif ?>
            </div>
            <!-- Valor de indicador -->
            <div class="form-group">
                <input type="text" name="valorIndicador" id="valorIndicador" value="<?= set_value('valorIndicador') ?>" class="form-control mt-2" placeholder="Valor" required>
                <?php if( $validation->getError('valorIndicador') ):?>

                    <small id="helpId" class="text-danger"><?= $validation->getError('valorIndicador'); ?></small>

                <?php endif ?>
            </div>
            <!-- Fecha de indicador -->
            <div class="form-group">
                <input type="date" name="fechaIndicador" id="fechaIndicador" value="<?= set_value('fechaIndicador') ?>" class="form-control mt-2" required>
                <?php if( $validation->getError('fechaIndicador') ):?>

                    <small id="helpId" class="text-danger"><?= $validation->getError('fechaIndicador'); ?></small>

                <?php endif ?>
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

<h2>Reporte Gráfico</h2>
<form id="reportForm">
  <div class="row">
    <div class="col-4">
      <div class="form-group">
        <label for="desde">Desde</label>
        <input type="date" class="form-control" id="desde" name="desde" required min="<?= date('Y-m-d', strtotime($fecha_minima)) ?>" max="<?= date('Y-m-d', strtotime($fecha_maxima)) ?>">
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="hasta">Hasta</label>
        <input type="date" class="form-control" id="hasta" name="hasta" required min="<?= date('Y-m-d', strtotime($fecha_minima)) ?>" max="<?= date('Y-m-d', strtotime($fecha_maxima)) ?>">
      </div>
    </div>
    <div class="col-4">
      <button type="submit" class="btn btn-primary mt-4">Generar reporte</button>
    </div>
  </div>  
</form>

<canvas class="my-4 w-100" id="indicadorChart" width="900" height="380"></canvas>

<?= $this->endSection(); ?>
