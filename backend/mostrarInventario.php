

<?php
session_start();

if(isset($_SESSION['user'])){
    include_once 'conexion.php';
    $user = $_SESSION['user'];
    $activo = 'v';
    //leer
    $sql_leer = 'SELECT * FROM inventarios WHERE asistente = ? And inv_status=?';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(array($user,$activo));//ENVIO EL PARAMETRO PARA ASISTENTE

    $resultado = $gsent -> fetchAll();
    //var_dump($resultado);
}else{
  include_once 'conexion.php';
  $sql_leer = 'SELECT * FROM inventarios WHERE inv_status=?';
  $activo = 'v';
  $gsent = $pdo->prepare($sql_leer);
  $gsent->execute(array($activo));

  $resultado = $gsent -> fetchAll();
}
?>


  <table id="tabla" class="table table-hover table-responsive text-center table-bordered">
    <thead class="thead-light">
          <tr>
          <th>N° de Expediente</th><th>Tipo de Expediente</th><th>Procedencia de Expediente</th><th>Tipo</th><th>Dependencia</th><th>Fecha de Presentación</th><th>Fecha de Ingreso</th><th>Fecha de Entrega</th><th>Asistente Encargado</th><th>Cargo</th><th>Fecha de última resolución</th><th>Estado del proceso</th><th>Detalle del estado</th><th>Fojas</th><th>Motivo</th><th>Acción</th><th>Acción</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $valor): ?>
          <tr>
           
        <td > <?php echo $valor['n_exp'] ?> </td>
		    <td> <?php echo $valor['tipo_exp']?> </td>	
	    	<td> <?php echo $valor['proce_exp'] ?> </td>	
        <td> <?php echo $valor['tipo_proce']?> </td>
        <td> <?php echo $valor['dependencia'] ?> </td>
        <td> <?php echo $valor['f_presentacion'] ?> </td>
        <td> <?php echo $valor['f_ingreso'] ?> </td>
        <td> <?php echo $valor['f_entrega'] ?> </td>
        <td> <?php echo $valor['asistente'] ?> </td>
        <td> <?php echo $valor['cargo'] ?> </td>
        <td> <?php echo $valor['f_ultima'] ?> </td>
        <td> <?php echo $valor['estado_proce'] ?> </td>
        <td> <?php echo $valor['detalle_estado'] ?> </td>
        <td> <?php echo $valor['fojas'] ?> </td>
        <td> <?php echo $valor['motivo'] ?> </td>
        
        <?php $datos =  $valor['ID']."|".$valor['n_exp']."|".$valor['tipo_exp']."|".$valor['proce_exp']."|".$valor['tipo_proce']."|".$valor['dependencia']."|".$valor['f_presentacion']."|".$valor['f_ingreso']."|".$valor['f_entrega']."|".$valor['asistente']."|".$valor['cargo']."|".$valor['f_ultima']."|".$valor['estado_proce']."|".$valor['detalle_estado']."|".$valor['fojas']."|".$valor['motivo'];
        ?>

        <td><button class ="btn btn-warning" data-toggle="modal" data-target="#Actualizar" id ="update" name="<?php echo $valor['ID']?>" onclick = "agregarDatos('<?php echo $datos?>')">Editar</td></button>
	    	<td><button class ="btn btn-danger"  id ="eliminar" name="" onclick = "ConfirmarArchivar(<?php echo $valor['ID']?>)">Archivar</td></button>
     
          </tr>
          <?php endforeach; ?>
         
        </tbody>
      </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



  </body>
</html>

