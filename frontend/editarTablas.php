<?php
session_start();

if(isset($_SESSION['admin'])){
   // echo 'Bienvenido '.$_SESSION['admin'];
   // echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}elseif (isset($_SESSION['user'])) {
   // echo 'Bienvenido '.$_SESSION['user'];
   // echo '<br><a href="../backend/cerrar.php">CerrarSesion</a>';
}
else{
    header('Location:../index.html');
}
include_once '../backend/conexion.php';

  
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Editar Tablas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="../lib/font-awe/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/smooth-scroll.min.js"></script>
    <script>
    smoothScroll.init({
        selector: '[data-scroll]',
        selectorHeader: null,
        speed: 800,
        easing: 'easeInOutCubic',
        offset: 0,
        callback: function(anchor, toggle){}
    });
    </script>

  </head>
  <body>
  <body data-spy="scroll" data-target="#sidebar" data-offset="80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 navbar-dark bg-dark sidebar sidebar-sticky fixed-top" id="sidebar">
                <nav class="navbar navbar-expand-lg flex-lg-column text-center">
                    <a class="h3 py-lg-5 text-white" href="#">Seleccione una tabla</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav flex-lg-column">
                            <a class="nav-item nav-link lead" data-scroll href="#sec1">Tipo de expediente</a>
                            <a class="nav-item nav-link lead" data-scroll href="#sec2">Procedencia de expediente</a>
                            <a class="nav-item nav-link lead" data-scroll href="#sec3">Tipo de Procedencia</a>
                            <a class="nav-item nav-link lead" data-scroll href="#sec4">Cargo</a>
                            <a class="nav-item nav-link lead" data-scroll href="#sec5">Estado del Proceso</a>
                            <a class="nav-item nav-link lead" data-scroll href="#sec6">Detalle del Estado</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <h1 class="py-5 display-4" id="sec1">Editar Tablas</h1>
                <h3 class="py-5">Tipo de Expediente</h3>
                <div class="py-2 mr-5 row justify-content-center">
                  <div class="col-2">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#Modaltipo_exp">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para tipo de expediente-->
                    <div class="modal fade" id="Modaltipo_exp" tabindex="-1" role="dialog" aria-labelledby="Modaltipo_expLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Modaltipo_expLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError">Campo requerido</div>
                        <label for="desc_tipo" class="col-form-label">Ingrese un tipo de expediente:</label>
                        <input type="text" name="desc_tipo" value="" id="desc_tipo" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick ="InsertarTipo()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>

                  </div>
                  <div class="p ml-md-5">
                  <table id="tablaEstado" class="table table-hover table-responsive text-center table-bordered">
                   <thead class="thead-light">
                      <tr>
                      <th>Tipo de Expediente</th><th>Acción</th>
                      </tr>
                   </thead>
                    <tbody>
                    <?
                    $sql_leer = 'SELECT * FROM tipo_exp';
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                    $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_tipo']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_tipo=<?php echo $valor['id_tipo']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                    </table>
                  </div>
                </div>

                <h3 class="py-5" id="sec2">Procedencia del Expediente</h3>
               
                <div class="py-2 mr-5 row justify-content-center">
                <div class="col-2">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#Modalproce_exp">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para procendencia de expediente-->
                    <div class="modal fade" id="Modalproce_exp" tabindex="-1" role="dialog" aria-labelledby="Modalproce_expLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Modalproce_expLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError2">Campo requerido</div>
                        <label for="desc_proce" class="col-form-label">Ingrese una procedencia de expediente:</label>
                        <input type="text" name="desc_proce" value="" id="desc_proce" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick ="InsertarProce()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>

                  </div>
                <div class="p ml-md-5">
                  <table id="tablaEstado" class="table table-hover table-responsive text-center table-bordered">
                  <thead class="thead-light">
                      <tr>
                      <th>Procedencia de Expediente</th><th>Acción</th>
                      </tr>
                  </thead>
                    <tbody>
                    <?
                    $sql_leer = 'SELECT * FROM proce_exp';
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                    $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_proce']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_proce=<?php echo $valor['id_proce']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                 </table>
                
                </div>
                </div>

                <h3 class="py-5" id="sec3">Tipo de Procedencia</h3>
                <div class="py-2 mr-5 row justify-content-center">
                <div class="col-2">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#Modaltipo_proce">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para procendencia de expediente-->
                    <div class="modal fade" id="Modaltipo_proce" tabindex="-1" role="dialog" aria-labelledby="Modaltipo_proceLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="Modaltipo_proceLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError3">Campo requerido</div>
                        <label for="desc_tipo_proce" class="col-form-label">Ingrese un tipo de procedencia:</label>
                        <input type="text" name="desc_tipo_proce" value="" id="desc_tipo_proce" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick ="InsertarTipoProce()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>

                <div class="p ml-md-5">
                  <table id="tablaEstado" class="table table-hover table-responsive text-center table-bordered">
                  <thead class="thead-light">
                      <tr>
                      <th>Tipo de Procedencia</th><th>Acción</th>
                      </tr>
                  </thead>
                    <tbody>
                    <?
                    $sql_leer = 'SELECT * FROM tipo_proce';
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                    $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_tipo_proce']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_tipo_proce=<?php echo $valor['id_tipo_proce']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                </table>
                
                  
                </div>
                </div>

                <h3 class="py-5" id="sec4">Cargo</h3>
                <div class="py-2 mr-5 row justify-content-center">
                <div class="col-2 mr-5">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#Modalcargo">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para procendencia de expediente-->
                    <div class="modal fade" id="Modalcargo" tabindex="-1" role="dialog" aria-labelledby="ModalcargoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalcargoLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError4">Campo requerido</div>
                        <label for="desc_cargo" class="col-form-label">Ingrese un cargo:</label>
                        <input type="text" name="desc_cargo" value="" id="desc_cargo" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick ="InsertarCargo()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>
                <div class="p ml-md-3">
                    <table id="tablaEstado" class="table table-hover table-responsive text-center table-bordered">
                  <thead class="thead-light">
                      <tr>
                      <th>Cargo</th><th>Acción</th>
                      </tr>
                  </thead>
                    <tbody>
                    <?
                    $sql_leer = 'SELECT * FROM cargo';
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                    $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_cargo']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_cargo=<?php echo $valor['id_cargo']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                </table>
                
                </div>
                </div>

                <h3 class="py-5" id="sec5">Estado del Proceso</h3>
                <div class="py-2 mr-5 row justify-content-center">
                <div class="col-2">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#ModalEstado_proce">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para procendencia de expediente-->
                    <div class="modal fade" id="ModalEstado_proce" tabindex="-1" role="dialog" aria-labelledby="ModalEstado_proceLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <div class="alert alert-danger d-none" id="mensajeError">Campo requerido</div>
                          <h5 class="modal-title" id="ModalEstado_proceLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError5">Campo requerido</div>
                        <label for="desc_estado" class="col-form-label">Ingrese un estado del proceso:</label>
                        <input type="text" name="desc_estado" value="" id="desc_estado" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary"  onclick ="InsertarEstado()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>
                <div class="p ml-md-5">
                 <table id="tablaEstado" class="table table-hover table-responsive text-center table-bordered">
                  <thead class="thead-light">
                      <tr>
                      <th>Estado_Proceso</th><th>Acción</th>
                      </tr>
                  </thead>
                    <tbody>
                    <?
                    $sql_leer = 'SELECT * FROM estado_proceso';
                    $gsent = $pdo->prepare($sql_leer);
                    $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                    $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_estado']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_estado=<?php echo $valor['id_estado']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                  </table>

                </div>
                </div>
               
                <h3 class="py-5" id ="sec6">Detalle del Estado</h3>
                <div class="py-2 mr-5 row justify-content-center">
                <div class="col-2">
                    <button class="btn btn-primary mt-2 mr-md-5" data-toggle="modal" data-target="#ModalDetalle_estado">Agregar Nuevo
                    <i class="fas fa-plus-square"></i>
                    </button>
                
                  <!-- Modal Para procendencia de expediente-->
                    <div class="modal fade" id="ModalDetalle_estado" tabindex="-1" role="dialog" aria-labelledby="ModalDetalle_estadoLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="ModalDetalle_estadoLabel">Registrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger d-none" id="mensajeError6">Campo requerido</div>
                        <label for="desc_detalle" class="col-form-label">Ingrese un detalle del estado:</label>
                        <input type="text" name="desc_detalle" value="" id="desc_detalle" autocomplete="off" class="form-control" required>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick ="InsertarDetalle()">Agregar</button>
                        </div>
                      </div>
                    </div>
                   </div>
                  </div>
                <div class="p ml-md-5">
                  
                  <table id="tablaDetalle" class="table table-hover table-responsive text-center table-bordered">
                    <thead class="thead-light">
                      <tr>
                      <th>Detalle_estado</th><th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                      $sql_leer = 'SELECT * FROM detalle_estado';
                      $gsent = $pdo->prepare($sql_leer);
                      $gsent->execute();//ENVIO EL PARAMETRO PARA ASISTENTE

                      $resultado = $gsent -> fetchAll();
                    ?>
                    <?php foreach ($resultado as $valor): ?>
                      <tr>
                      
                    <td > <?php echo utf8_encode($valor['desc_detalle']) ?> </td>
                    
              
                    <td> <a href="../backend/eliminar.php?id_detalle_estado=<?php echo $valor['id_detalle_estado']?>" class="float-right mr-3">
                         <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/alertifyjs/alertify.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>