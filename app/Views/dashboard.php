<!doctype html>
<html lang="es">

<head>
  <title>Indicadores</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
  
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/dashboard.css')?>" rel="stylesheet">

  <!-- Datatables -->
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Σ SOLUTORIA</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?= base_url('logout') ?>">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    
    <!-- aside -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="importarIndicadores()">Importar Indicadores</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Nuevo Indicador</h4>
                
                <div class="container">
                  <form>
                    <!-- Nombre de indicador -->
                    <input type="text" name="nombreIndicador" id="" class="form-control mt-2" placeholder="Nombre de Indicador" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    <!-- Código de indicador -->
                    <input type="text" name="codigoIndicador" id="" class="form-control mt-2" placeholder="Código de Indicador" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    <!-- Unidad de medida de indicador -->
                    <input type="text" name="unidadMedidaIndicador" id="" class="form-control mt-2" placeholder="Unidad de Medida Indicador" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    <!-- Valor de indicador -->
                    <input type="text" name="valorIndicador" id="" class="form-control mt-2" placeholder="Valor Indicador" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    <div class="mb-3 row">
                      <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Action</button>
                      </div>
                    </div>
                  </form>
                </div>
                    
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
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      
      <h2>Section title</h2>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      
    </main>
  </div> <!-- row end -->
</div> <!-- container end -->

<!-- Bootstrap JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

    
    <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTable.js') ?>"></script>
    <script src="<?= base_url('assets/js/import.js') ?>"></script>

  </body>
</html>
