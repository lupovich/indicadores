<?= $this->include('templates/header') ?>

<?= $this->include('templates/aside') ?>

  <?= $this->renderSection('contentCrud') ?>
  
  <?= $this->renderSection('contentChart') ?>
    
<?= $this->include('templates/footer') ?>