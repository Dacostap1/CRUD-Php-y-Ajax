<?php
session_start();

if(isset($_SESSION['admin'])){
 // echo 'Bienvenido '.$_SESSION['admin'];
   $asistente = $_SESSION['admin'];
 // echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
  //echo 'Bienvenido '.$_SESSION['user'];
  $asistente = $_SESSION['user'];
  
  //echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
  header('Location:../index.html');
}

include_once 'conexion.php';

$id = $_POST['id'];
$n_exp = $_POST['numero_exp_a'];
$tipo_exp = $_POST['tipo_exp_a'];
$proce_exp = $_POST['proce_exp_a'];
$tipo_proce = $_POST['tipo_proce_a'];
$dependencia = $_POST['dependencia_a'];
$f_presentacion = $_POST['f_presentacion_a'];
$f_ingreso = $_POST['f_ingreso_a'];
$f_entrega = $_POST['f_entrega_a'];
$asistente = $_POST['asistente_a'];
$cargo = $_POST['cargo_a'];
$f_ultima = $_POST['f_ultima_a'];
$estado_proce = $_POST['estado_proce_a'];
$detalle_estado = $_POST['detalle_estado_a'];
$fojas = $_POST['fojas_a'];
$motivo = $_POST['motivo_a'];





$sql_editar = 'UPDATE inventarios SET n_exp=?,tipo_exp=?,proce_exp=?,tipo_proce=?,dependencia=?,f_presentacion=?,f_ingreso=?,f_entrega=?,asistente=?,cargo=?,f_ultima=?,estado_proce=?,detalle_estado=?,fojas=?,motivo=? WHERE ID=?';
$sentencia_editar = $pdo -> prepare($sql_editar);
$sentencia_editar -> execute(array($n_exp,$tipo_exp,$proce_exp,$tipo_proce,$dependencia,$f_presentacion,$f_ingreso,$f_entrega,$asistente,$cargo,$f_ultima,$estado_proce,$detalle_estado,$fojas,$motivo,$id));


  //Cerrar la conexión a la base de datos
  $sentencia_agregar = null;
  $pdo = null;
  
//header('location:index.php');