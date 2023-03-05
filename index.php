<?php
session_start();
if (!isset($_SESSION['user_token'])) {
    header('location: ./login/login.php');
}
  $espacio = (isset($_GET['espacio']) ? $_GET['espacio'] : "");
  if($espacio == "") header("Location: index.php?espacio=personal&view=inicio");
  $_SESSION['espacio'] = $espacio;
  $view = (isset($_GET['view']) ? $_GET['view'] : "inicio");
  switch ($view) {
    case 'inicio':
      $page = "inicio.php";
      $seccion = "Inicio";
      $js= "inicio.js";
      break;
    case 'gastos':
      $page = "gastos.php";
      $seccion = "Gastos";
      $js= "gastos.js";
    break;
    case 'ingresos':
      $page = "ingresos.php";
      $seccion = "Ingresos";
      $js= "ingresos.js";
    break;
    case 'categorias':
      $page = "categorias.php";
      $seccion = "Categorias";
      $js= "categorias.js";
    break;
    case 'espacios':
      $page = "espacios.php";
      $seccion = "Espacios";
      $js = "espacios.js";
    break;
    case 'usuario':
      $page = "usuario.php";
      $seccion = "Usuario";
    break;
    case 'configuracion':
      $page = "configuracion.php";
      $seccion = "Configuración";
    break;
    default:
      $page = "inicio.php";
      $seccion = "Inicio";
      $js= "inicio.js";
    break;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">

    <title><?php echo $seccion; ?> | Apga Bliss</title>

    <!-- Custom fonts for this template-->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="./assets/js/sweetalert2.min.js"></script>
    <link href="./assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script  src="./assets/js/vue.global.js"></script>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php require_once "./sidebar.php"; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <div id="vue-header"><?php require_once "./header.php"; ?></div>
        <div id="vue-content"><?php require_once './modules/'.$page; ?></div>
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="assets/js/sb-admin-2.js"></script> -->

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="main.js"></script>
  <script src="./modules/<?php echo $js; ?>"></script>
  <!-- <script src="assets/js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="assets/js/demo/chart-pie-demo.js"></script> -->
</body>
</html>