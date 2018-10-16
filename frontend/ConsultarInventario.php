<?php
session_start();

if(isset($_SESSION['admin'])){
    echo 'Bienvenido '.$_SESSION['admin'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
    echo 'Bienvenido '.$_SESSION['user'];
    echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
    header('Location:../index.html');
}
include_once '../backend/conexion.php';

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
    <link rel="stylesheet" href="../lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../lib/DataTables/DataTables-1.10.18/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../lib/MDB-4.5.12/css/mdb.min.css">
  </head>
  <body id = "body">
      <div class="container-fluid">

          <h1 class="display-4 text-center">Consolidado</h1>
          <a class="btn btn-primary" href="ConsultarInventarioArchivado.php" role="button">Archivados</a>
      </div>
      <div class="container-fluid mt-3" id = "cont">
     
          
      </div>

      <!-- Button trigger modal -->


<!-- Modal Actualizar-->
<div class="modal fade" id="Actualizar" role="dialog" aria-labelledby="ActualizarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ActualizarLabel">Editar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      <form id="formularioActualizar" novalidate>
  
             <input type="text" hidden="" id ="id_update" name="">
                <div class="row form-group">
                    <label for="numero_exp_a" class="col-form-label col-md-4">N° de expediente:</label>
                    <div class="col-md-8">
                        <input type="text" name="numero_exp_a" value="<?php echo $resultadou['n_exp']?>" id="numero_exp_a" autocomplete="off" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                <label for="tipo_exp_a" class="col-form-label col-md-4">Tipo de Expediente:</label>
                <select id ="tipo_exp_a" class="custom-select col-7 ml-3 selector_tipo" name="tipo_exp_a">
                <?php

                  //leer
                  $sql_leer = 'SELECT * FROM tipo_exp';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo $valor['desc_tipo']?>"><?php echo utf8_encode($valor['desc_tipo'])?></option>
                <?php endforeach ?>
                </select>
                </div>
                

                <div id = 'procedencia_a'class="row form-group">
                <label for="proce_exp_a" class="col-form-label col-md-4">Procedencia de Expediente:</label>
                <select id = "proce_exp_a" class="custom-select col-7 ml-3" name="proce_exp_a">

               <?php
                //leer
                  $sql_leer = 'SELECT * FROM proce_exp';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo $valor['desc_proce']?>"><?php echo utf8_encode($valor['desc_proce'])?></option>
                <?php endforeach ?>
                </select>
                </select>
                </div>

                <div class="row form-group">
                <label for="tipo_proce_a" class="col-form-label col-md-4">Tipo de procedencia:</label>
                <select id = "tipo_proce_a" class="custom-select col-7 ml-3" name="tipo_proce_a">
                <?php
                  
                  //leer
                  $sql_leer = 'SELECT * FROM tipo_proce';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo $valor['desc_tipo_proce']?>"><?php echo utf8_encode($valor['desc_tipo_proce'])?></option>
                <?php endforeach ?>
                </select>
                </div>

                <div class="row form-group">
                    <label for="dependencia_a" class="col-form-label ml-3 col-md-4">Dependencia:</label>
                     <select class="custom-select col-md-7 form-control dependencia" name="dependencia_a" id="dependencia_a" style="width:61%">
                    <?php
                      
                      //leer
                      $sql_leer = 'SELECT * FROM dependencia';
                      $gsent = $pdo->prepare($sql_leer);
                      $gsent->execute();
                  
                      $resultado = $gsent -> fetchAll();

                    foreach($resultado as $valor):
                    ?>
                        <option value="<?php echo utf8_encode($valor['desc_dependencia'])?>"><?php echo utf8_encode($valor['desc_dependencia'])?></option>
                    <?php endforeach ?>
                    </select>

                </div>

                <div class="row form-group">
                    <label for="v" class="col-form-label col-md-4">Fecha de Presentación Odecma:</label>
                    <div class="col-md-8">
                        <input type="text" name="f_presentacion_a" value=""  id="f_presentacion_a" autocomplete="off" data-toggle = " datepicker " class="form-control date bg-white" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label for="f_ingreso_a" class="col-form-label col-md-4">Fecha de Ingreso a la unidad:</label>
                    <div class="col-md-8">
                        <input type="text" name="f_ingreso_a" value="" id="f_ingreso_a"  autocomplete="off" class="form-control date bg-white" required>
                    </div>
                </div>

                 <div class="row form-group">
                    <label for="f_entrega_a" class="col-form-label col-md-4">Fecha de Entrega al asistente:</label>
                    <div class="col-md-8">
                        <input type="text" name="f_entrega_a" value="" id="f_entrega_a" autocomplete="off" readonly="" class="form-control date bg-white" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label for="asistente_a" class="col-form-label col-md-4">Asistente Encargado:</label>
                    <div class="col-md-8">
                        <input type="text" name="asistente_a" value="" readonly="" id="asistente_a" class="form-control bg-white" required>
                    </div>
                </div>

                <div class="row form-group">
                <label for="cargo_a" class="col-form-label col-md-4">Cargo del Investigado:</label>
                <select class="custom-select col-7 ml-3" name="cargo_a" id="cargo_a" >
                <?php
                  
                  //leer
                  $sql_leer = 'SELECT * FROM cargo';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo $valor['desc_cargo']?>"><?php echo utf8_encode($valor['desc_cargo'])?></option>
                <?php endforeach ?>
                </select>
                </div>

                <div class="row form-group">
                    <label for="f_ultima_a" class="col-form-label col-md-4">Fecha de última resolucion:</label>
                    <div class="col-md-8">
                        <input type="text" name="f_ultima_a" value="" id="f_ultima_a" autocomplete="off" class="form-control date bg-white" required>
                    </div>
                </div>

                <div class="row form-group">
                <label for="estado_proce_a" class="col-form-label col-md-4">Estado del proceso:</label>
                <select id = "estado_proce_a" class="custom-select col-7 ml-3" name="estado_proce_a">
                <?php
                  
                  //leer
                  $sql_leer = 'SELECT * FROM estado_proceso';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo utf8_encode($valor['desc_estado'])?>"><?php echo utf8_encode($valor['desc_estado'])?></option>
                <?php endforeach ?>
                </select>
                </div>

                <div class="row form-group">
                <label for="detalle_estado_a" class="col-form-label col-md-4">Detalle del estado:</label>
                <select id ="detalle_estado_a" class="custom-select col-7 ml-3" name="detalle_estado_a">
                <?php
                  
                  //leer
                  $sql_leer = 'SELECT * FROM detalle_estado';
                  $gsent = $pdo->prepare($sql_leer);
                  $gsent->execute();
              
                  $resultado = $gsent -> fetchAll();

                foreach($resultado as $valor):
                ?>
                    <option value="<?php echo utf8_encode($valor['desc_detalle'])?>"><?php echo utf8_encode($valor['desc_detalle'])?></option>
                <?php endforeach ?>
                </select>
                </div>

                 <div class="row form-group">
                    <label for="fojas_a" class="col-form-label col-md-4">Fojas:</label>
                    <div class="col-md-8">
                        <input type="text" name="fojas_a" value="" id="fojas_a" autocomplete="off" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label for="motivo_a" class="col-form-label col-md-4">Motivo de la Sancion:</label>
                    <div class="col-md-8">
                        <textarea rows="3" class="form-control" id="motivo_a" name="motivo_a" required></textarea>
                    </div>
                </div>
                
                
                
            </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="update" class="btn btn-primary" data-dismiss="modal" >Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delegar-->
<div class="modal fade" id="ChangeUser" role="dialog" aria-labelledby="ChangeUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ChangeUserLabel">Delegar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" id="radio1" name="cmethod" value="phone" checked>
                <label class="form-check-label" for="radio1">Phone</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" id="radio2" name="cmethod" value="mail">
                <label class="form-check-label" for="radio2">Email</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" id="radio3" name="cmethod" value="post">
                <label class="form-check-label" for="radio3">Post</label>
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="change" class="btn btn-primary" data-dismiss="modal" >Delegar</button>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
   
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/DataTables/datatables.min.js"></script> 
    <script src="../lib/DataTables/DataTables-1.10.18/dataTables.buttons.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.flash.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/jszip.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/pdfmake.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/vfs_fonts.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.html5.min.js"></script>
    <script src="../lib/DataTables/DataTables-1.10.18/buttons.print.min.js"></script> 
    <script src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>
    <script src="../lib/MDB-4.5.12/js/mdb.min.js" ></script>

<script>
$('#dependencia_a').select2();
$('#fecha_ultima_a').datepicker({
    format: "dd/mm/yy",
     autoclose: true,
     zIndex: 2048,
    });


</script>
</body>
</html>