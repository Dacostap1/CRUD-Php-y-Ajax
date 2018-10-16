<?php
session_start();

if(isset($_SESSION['admin'])){
 // echo 'Bienvenido '.$_SESSION['admin'];
   $asistente = $_SESSION['admin'];
  echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
  //echo 'Bienvenido '.$_SESSION['user'];
  $asistente = $_SESSION['user'];
  
  //echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
  header('Location:../index.html');
}


    include_once 'conexion.php';

    $id= $_POST['id'];
    $activo = 'v';
    $sql_editar = 'UPDATE inventarios SET inv_status=? WHERE ID=?';
    $sentencia_editar = $pdo -> prepare($sql_editar);
    $sentencia_editar -> execute(array($activo,$id));


  //Cerrar la conexión a la base de datos
     $sentencia_agregar = null;
     $pdo = null;

