<?php
session_start();

if(isset($_SESSION['admin'])){
    echo 'Bienvenido '.$_SESSION['admin'];
    $usuario = $_SESSION['admin'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
    echo 'Bienvenido '.$_SESSION['user'];
    $usuario = $_SESSION['user'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
    header('Location:../index.html');
}

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
</head>
  <body>
      <div class="container">
        <h1 class="mt-5 text-center text-uppercase font-weight-light display-4">Bienvenido <?php echo $usuario ?></h1>
        <hr>
        <div class="row my-5 text-center">
            <div class="col-md-4 ">
                <a href="registroInventario.php"><img src="../img/registro.png" alt="" class="img-fluid"></a>
                <p class="lead mt-3">Registro</p>
            </div>

            <div class="col-md-4 ">
                <a href="ConsultarInventario.php"><img src="../img/consulta.png" alt="" width="240px" class="img-fluid"></a>
                <p class="lead mt-3">Consulta</p>
            </div>
            <?php if($_SESSION['user']): ?>
            <div class="col-md-4">
            <a href="../backend/cerrar.php"><img src="../img/salir.png" alt="" width="240px" class="img-fluid rounded-circle"></a> 
                <p class="lead mt-3">Salir</p>
            </div>
            <?php endif ?> 

            <?php if($_SESSION['admin']): ?>
            <div class="col-md-4">
            <a href="../frontend/editarTablas.php"><img src="../img/configurar.png" alt="" width="240px" class="img-fluid rounded-circle"></a> 
                <p class="lead mt-3">Editar Tablas</p>
            </div>
            <?php endif ?>     

        </div>
     </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
    </script>
</body>
</html>
