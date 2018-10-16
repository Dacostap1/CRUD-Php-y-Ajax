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

    //leer
    $sql_leer = 'SELECT * FROM inventarios';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent -> fetchAll();
   // var_dump($resultado);

    //Agregar
   
       $n_exp = $_POST['numero_exp'];
       $tipo_exp = $_POST['tipo_exp'];
       $proce_exp = $_POST['proce_exp'];
       $tipo_proce = $_POST['tipo_proce'];
       $dependencia = $_POST['dependencia'];
       $f_presentacion = $_POST['f_presentacion'];
       $f_ingreso = $_POST['f_ingreso'];
       $f_entrega = $_POST['f_entrega'];
       $asistente;
       $cargo = $_POST['cargo'];
       $f_ultima = $_POST['f_ultima'];
       $estado_proce = $_POST['estado_proce'];
       $detalle_estado = $_POST['detalle_estado'];
       $fojas = $_POST['fojas'];
       $motivo = $_POST['motivo'];
      
       
        $sql_agregar = 'INSERT INTO inventarios (n_exp,tipo_exp,proce_exp,tipo_proce,dependencia,f_presentacion,f_ingreso,f_entrega,asistente,cargo,f_ultima,estado_proce,detalle_estado,fojas,motivo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($n_exp,$tipo_exp,$proce_exp,$tipo_proce,$dependencia,$f_presentacion,$f_ingreso,$f_entrega,$asistente,$cargo,$f_ultima,$estado_proce,$detalle_estado,$fojas,$motivo));
 
        //Cerrar la conexión a la base de datos
        $sentencia_agregar = null;
        $pdo = null;
      // header('location:../frontend/registroInventario.php');

    