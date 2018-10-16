<?php
session_start();

if(isset($_SESSION['admin'])){
    echo 'Bienvenido '.$_SESSION['admin'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
    echo 'Bienvenido '.$_SESSION['user'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
    header('Location:../index.html');
}
include_once '../backend/conexion.php';

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../lib/DataTables/DataTables-1.10.18/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../css/select2.min.css">
  </head>
  <body id = "bodyArchivado">
      <div class="container-fluid">

          <h1 class="display-4 text-center">Archivados</h1>
          <a class="btn btn-primary" href="ConsultarInventario.php" role="button">Consolidado</a>
      </div>
      <div class="container-fluid mt-3" id = "conta">
     
          
      </div>

 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script> 
    <script src="../lib/DataTables/DataTables-1.10.18/dataTables.buttons.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.flash.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/jszip.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/pdfmake.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/vfs_fonts.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.html5.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.print.min.js"></script> 
    <script src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>

<script>
$('#dependencia_a').select2();
$('#fecha_ultima_a').datepicker({
    format: "dd/mm/yy",
     autoclose: true,
     zIndex: 2048,
    });


</script>
</body>
</html>