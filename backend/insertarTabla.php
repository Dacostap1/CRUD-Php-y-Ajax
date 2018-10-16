<?php
session_start();

if(isset($_SESSION['admin'])){
  echo 'Bienvenido '.$_SESSION['admin'];
   $asistente = $_SESSION['admin'];
  echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
  echo 'Bienvenido '.$_SESSION['user'];
  $asistente = $_SESSION['user'];
  
  echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
  header('Location:../index.html');
}
    
    include_once 'conexion.php';



    if(isset($_POST['desc_detalle'])){

        $desc_detalle = $_POST['desc_detalle'];
        if ($desc_detalle === ''){
            die();
        }else{
        
        $sql_agregar = 'INSERT INTO detalle_estado (desc_detalle) VALUES (?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($desc_detalle));
        }
    }
    elseif(isset($_POST['desc_estado'])){

        $desc_estado = $_POST['desc_estado'];
        if ($desc_estado === ''){
            die();
        }else{
        $sql_agregar = 'INSERT INTO estado_proceso (desc_estado) VALUES (?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($desc_estado));
        }
    }
    elseif(isset($_POST['desc_proce'])){

        $desc_proce = $_POST['desc_proce'];
        if ($desc_proce === ''){
            die();
        }else{
        $sql_agregar = 'INSERT INTO proce_exp (desc_proce) VALUES (?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($desc_proce));
        }
    }
    elseif(isset($_POST['desc_tipo'])){

        $desc_tipo = $_POST['desc_tipo'];
        if ($desc_tipo === ''){
            die();
        }else{

            $sql_agregar = 'INSERT INTO tipo_exp (desc_tipo) VALUES (?)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
            $sentencia_agregar->execute(array($desc_tipo));
        }
    }
    elseif(isset($_POST['desc_cargo'])){

        $desc_cargo = $_POST['desc_cargo'];
        if ($desc_cargo === ''){
            die();
        }else{
        $sql_agregar = 'INSERT INTO cargo (desc_cargo) VALUES (?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($desc_cargo));
        }
    }
    elseif(isset($_POST['desc_tipo_proce'])){

        $desc_tipo_proce = $_POST['desc_tipo_proce'];
        if ($desc_tipo_proce === ''){
            die();
        }else{
        $sql_agregar = 'INSERT INTO tipo_proce (desc_tipo_proce) VALUES (?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($desc_tipo_proce));
        }
    }
    

   

////

   