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

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Inventarios</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../lib/MDB-4.5.12/css/mdb.min.css">
    

</head>
  <body>
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-7">
                <h1 class="display-4">Registro de Inventarios</h1>
                <hr class="bg-info">  
                <p class="text-danger small pt-0 mt-0">*Todos los campos son obligatorios</p>

                <div class="alert alert-success d-none" id="mensajeExito">Mensaje enviado con éxito</div>
                <div class="alert alert-danger d-none" id="mensajeError"></div>

                <form id="formulario" class="mt-4" novalidate>

                
                    <div class="row form-group">
                        <label for="numero_exp" class="col-form-label col-md-4">N° de expediente:</label>
                        <div class="col-md-8">
                            <input type="text" name="numero_exp" value="" id="numero_exp" autocomplete="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                    <label for="tipo_exp" class="col-form-label col-md-4">Tipo de Expediente:</label>
                    <select class="custom-select col-7 ml-3 selector_tipo" name="tipo_exp">
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
                    

                    <div id = 'procedencia'class="row form-group">
                    <label for="proce_exp" class="col-form-label col-md-4">Procedencia de Expediente:</label>
                    <select class="custom-select col-7 ml-3" name="proce_exp">

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
                    <label for="tipo_proce" class="col-form-label col-md-4">Tipo de procedencia:</label>
                    <select class="custom-select col-7 ml-3" name="tipo_proce">
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
                        <label for="dependencia" class="col-form-label ml-3 col-md-4">Dependencia:</label>
                        <select class="custom-select col-md-7 form-control dependencia" name="dependencia" id="dependencia" style="width:61%">
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
                            <input type="text" name="f_presentacion" value="" readonly="" id="f_presentacion" autocomplete="off" class="form-control date bg-white" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="f_ingreso" class="col-form-label col-md-4">Fecha de Ingreso a la unidad:</label>
                        <div class="col-md-8">
                            <input type="text" name="f_ingreso" value="" id="f_ingreso" readonly="" autocomplete="off" class="form-control date bg-white" required>
                        </div>
                    </div>

                     <div class="row form-group">
                        <label for="f_entrega" class="col-form-label col-md-4">Fecha de Entrega al asistente:</label>
                        <div class="col-md-8">
                            <input type="text" name="f_entrega" value="" id="f_entrega" autocomplete="off" readonly="" class="form-control date bg-white" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="asistente" class="col-form-label col-md-4">Asistente Encargado:</label>
                        <div class="col-md-8">
                            <input type="text" name="asistente" value="" id="asistente" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                    <label for="cargo" class="col-form-label col-md-4">Cargo del Investigado:</label>
                    <select class="custom-select col-7 ml-3" name="cargo" id="cargo" >
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
                        <label for="f_ultima" class="col-form-label col-md-4">Fecha de última resolucion:</label>
                        <div class="col-md-8">
                            <input type="text" name="f_ultima" value="" id="f_ultima" autocomplete="off" readonly="" class="form-control date bg-white" required>
                        </div>
                    </div>

                    <div class="row form-group">
                    <label for="estado_proce" class="col-form-label col-md-4">Estado del proceso:</label>
                    <select class="custom-select col-7 ml-3" name="estado_proce">
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
                    <label for="detalle_estado" class="col-form-label col-md-4">Detalle del estado:</label>
                    <select class="custom-select col-7 ml-3" name="detalle_estado">
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
                        <label for="fojas" class="col-form-label col-md-4">Fojas:</label>
                        <div class="col-md-8">
                            <input type="text" name="fojas" value="" id="fojas" autocomplete="off" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="motivo" class="col-form-label col-md-4">Motivo de la Sancion:</label>
                        <div class="col-md-8">
                            <textarea rows="3" class="form-control" id="motivo" name="motivo" required></textarea>
                        </div>
                    </div>
                    
                
                    <div class="text-center mt-4">
                        
                        <button type="submit" class="btn btn-info mr-4">Enviar</button>
                        <a href="paginainicio.php" class="btn btn-danger ml-4">Cancelar</button></a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.js"></script>                    
    <script src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../lib/MDB-4.5.12/js/mdb.min.js" ></script>
    <script src="../js/select2.min.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>
    <script src="../js/app.js"></script>


     <script>
     $(".selector_tipo").on( 'change', function() {
    if( $(this).val()!=='Visita') {
        // Hacer algo si el checkbox ha sido seleccionado
        document.getElementById("procedencia").innerHTML = `
        <label for="proce_exp" class="col-form-label col-md-4">Número de Expediente:</label>
        <div class="col-md-8">
        <input type="text" name="proce_exp" value="" id="proce_exp" class="form-control">
        </div>
        `;
    } 
    });

    $('.date').datepicker({
    format: "dd/mm/yy",
     autoclose: true,
    });
    $('#dependencia').select2();
    </script>
   

  

   
</body>
</html>