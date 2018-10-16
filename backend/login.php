<?php
session_start();
include_once 'conexion.php';

    $user = $_POST['usuario'];
    $clave = $_POST['pass'];

    echo'<pre>';

    var_dump($user);
    var_dump($clave);

    echo'<pre>';

    $sql = 'SELECT * FROM usuarios WHERE nombre = ?';
    $sentencia = $pdo -> prepare($sql);
    $sentencia -> execute(array($user));
    $resultado = $sentencia->fetch();//boolean

    echo'<pre>';
    var_dump($resultado);
    echo'<pre>';

    if(!$resultado){
        header('Location: ../index.html');
    }
    echo'<pre>';
    var_dump($resultado['clave']);
    echo'<pre>';


    if(password_verify($clave, $resultado['clave'])){
        echo 'las contraseñas son iguales</br>';
        if( strtolower($user) == 'admin'){
        $_SESSION['admin'] = $user;
       
        }else{
            $_SESSION['user'] = $user;
        }
       
        header('Location: ../frontend/paginaInicio.php ');
        
    }else{
        echo 'No son iguales las claves';
        die();
    }
    
        
    
