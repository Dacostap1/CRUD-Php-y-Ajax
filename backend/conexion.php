<?php

    $enlace = 'mysql:host=localhost;dbname=yt_colores';
    $usuario = 'root';
    $pass = 'root';

    try{
        $pdo = new PDO($enlace,$usuario,$pass);
       // echo 'conectado </br>';

      //  foreach($pdo -> query('SELECT * FROM `colores`') as $fila){
      //      print_r($fila);
     //   }
    }catch(PDOException $e){
        print "Error: ".$e->getMessage(). "</br>";
    }
    
