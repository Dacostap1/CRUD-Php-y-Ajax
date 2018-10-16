<?php
//echo password_hash("dany",PASSWORD_DEFAULT)."\n";

include_once 'conexion.php';

$usuario_nuevo =$_POST['usuario'];
$clave = $_POST['pass'];
$clave2 = $_POST['segunda_pass'];

//VERIFICAR SI USUARIO EXISTE
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo -> prepare($sql);
$sentencia -> execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

var_dump($resultado);

if($resultado){
   echo'</br>Usuario existente'; 
    die();
}

//hash de contraseñas
$clave = password_hash($clave,PASSWORD_DEFAULT);

echo '<pre>';
var_dump($usuario_nuevo);
var_dump($clave);
var_dump($clave2);
echo '<pre>';

if(password_verify($clave2, $clave)){
    echo 'la contraseña es valida </br>';

    

    $sql_agregar = 'INSERT INTO usuarios (nombre,clave) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);

    if($sentencia_agregar->execute(array($usuario_nuevo,$clave))){
        echo 'Agregado<br>';
        header('location:../index.html');
    }else{
        echo 'Error<br>';
    }
    

    //Cerrar la conexión a la base de datos
    $sentencia_agregar = null;
    $pdo = null;
   // header('location:index.php');


   
}else{
    echo 'la contraseña es invalida';
}
