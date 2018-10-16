<?php
session_start();

if(isset($_SESSION['admin'])){
 // echo 'Bienvenido '.$_SESSION['admin'];
   $asistente = $_SESSION['admin'];
  //echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
  //echo 'Bienvenido '.$_SESSION['user'];
  $asistente = $_SESSION['user'];
  
  //echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
  header('Location:../index.html');
}

include_once 'conexion.php';

if(isset($_GET['id_tipo'])){

$id= $_GET['id_tipo'];
$sql_eliminar = 'DELETE FROM tipo_exp WHERE id_tipo=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar -> execute(array($id));

header('location:../frontend/editarTablas.php');
}

if(isset($_GET['id_proce'])){

    $id= $_GET['id_proce'];
    $sql_eliminar = 'DELETE FROM proce_exp WHERE id_proce=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar -> execute(array($id));
    
    header('location:../frontend/editarTablas.php');
    }

if(isset($_GET['id_tipo_proce'])){

    $id= $_GET['id_tipo_proce'];
    $sql_eliminar = 'DELETE FROM tipo_proce WHERE id_tipo_proce=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar -> execute(array($id));
        
    header('location:../frontend/editarTablas.php');
    }

if(isset($_GET['id_cargo'])){

    $id= $_GET['id_cargo'];
    $sql_eliminar = 'DELETE FROM cargo WHERE id_cargo=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar -> execute(array($id));
        
    header('location:../frontend/editarTablas.php');
    }

if(isset($_GET['id_estado'])){

    $id= $_GET['id_estado'];
    $sql_eliminar = 'DELETE FROM estado_proceso WHERE id_estado=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar -> execute(array($id));
        
    header('location:../frontend/editarTablas.php');
    }

if(isset($_GET['id_detalle_estado'])){

    $id= $_GET['id_detalle_estado'];
    $sql_eliminar = 'DELETE FROM detalle_estado WHERE id_detalle_estado=?';
    $sentencia_eliminar = $pdo->prepare($sql_eliminar);
    $sentencia_eliminar -> execute(array($id));
        
    header('location:../frontend/editarTablas.php');
    }