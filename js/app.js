console.log('holi');


//insertar
$(document).ready(function(){
  $('#formulario').submit(function(e){ //ACTIVAMOS EL ENVENTO ENVIAR EN EL FORMULARIO
    e.preventDefault(); //PREVENIMOS QUE SE RECARGUE LA PAGINA, AUNQUE SE PUEDE ENTENDER DE OTRA MANERA. 
    var data=$(this).serializeArray();// SIRIALAIZ, Para volver los datos del formulario en una matriz de dos columnas name y value
  
    $.ajax({
      url:'../backend/agregarInventario.php',
      type: 'POST',
      data: data,
      success: function(dat){
       console.log('enviado');
     //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
  
          setTimeout(function(){
         $('input[type=text]').val('');
        }, 50);
        alertify.success("Inventario agregado");
          
      }
    })
  });
})



//mostrar
//document.getElementById("body").onload = function() {mostrar()};

$("#body").ready(mostrar());

function mostrar(){
	$.ajax({
		url:'../backend/mostrarInventario.php',
		type: 'get',
		success: function(dat){
      var show = $("#cont");
         show.html(dat); 
         $('#tabla').DataTable( {
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'print'
          ]
      } );
         console.log("mostrando");
		}
    })//ajax
}

$("#bodyArchivado").ready(mostrarArchivados());

function mostrarArchivados(){
	$.ajax({
		url:'../backend/mostrarInventarioArchivado.php',
		type: 'get',
		success: function(dat){
      var show = $("#conta");
         show.html(dat); 
         $('#tablaArchivada').DataTable( {
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'print'
          ]
      } );
         console.log("mostrandoArchivados");
		}
    })//ajax
}


$("#registro").submit(function(event){
  event.preventDefault(); //almacena los datos sin refrescar el sitio web.
  enviar();
});
function enviar(){
  //console.log("ejecutado");
  var datos = $("#formulario").serialize(); //toma los datos "name" y los lleva a un arreglo.
  $.ajax({
      type: "post",
      url:"../backend/agregarUsuario.php",
      data: datos,
      success: function(dat){
         console.log(enviado);
          }
      });
  };

function agregarDatos(datos){

  data = datos.split('|');
    $('#id_update').val(data[0]);
    $('#numero_exp_a').val(data[1]);
    $('#tipo_exp_a').val(data[2]);
    $('#proce_exp_a').val(data[3]);
    $('#tipo_proce_a').val(data[4]);
    $('#dependencia_a').val(data[5]);
    $('#f_presentacion_a').val(data[6]);
    $('#f_ingreso_a').val(data[7]);
    $('#f_entrega_a').val(data[8]);
    $('#asistente_a').val(data[9]);
    $('#cargo_a').val(data[10]);
    $('#f_ultima_a').val(data[11]);
    $('#estado_proce_a').val(data[12]);
    $('#detalle_estado_a').val(data[13]);
    $('#fojas_a').val(data[14]);
    $('#motivo_a').val(data[15]);
 
  //console.log(data[0]);//id
}


function actualizarDatos(){


    id= $('#id_update').val();
    numero_exp_a= $('#numero_exp_a').val();
    tipo_exp_a= $('#tipo_exp_a').val();
    proce_exp_a= $('#proce_exp_a').val();
    tipo_proce_a= $('#tipo_proce_a').val();
    dependencia_a= $('#dependencia_a').val();
    f_presentacion_a= $('#f_presentacion_a').val();
    f_ingreso_a= $('#f_ingreso_a').val();
    f_entrega_a= $('#f_entrega_a').val();
    asistente_a= $('#asistente_a').val();
    cargo_a= $('#cargo_a').val();
    f_ultima_a= $('#f_ultima_a').val();
    estado_proce_a= $('#estado_proce_a').val();
    detalle_estado_a= $('#detalle_estado_a').val();
    fojas_a= $('#fojas_a').val();
    motivo_a= $('#motivo_a').val();

    cadena =  "id=" + id +
              "&numero_exp_a=" + numero_exp_a +
              "&tipo_exp_a=" + tipo_exp_a +
              "&proce_exp_a=" + proce_exp_a +
              "&tipo_proce_a=" + tipo_proce_a +
              "&dependencia_a=" + dependencia_a +
              "&f_presentacion_a=" + f_presentacion_a +
              "&f_ingreso_a=" + f_ingreso_a +
              "&f_entrega_a=" + f_entrega_a +
              "&asistente_a=" + asistente_a +
              "&cargo_a=" + cargo_a +
              "&f_ultima_a=" + f_ultima_a +
              "&estado_proce_a=" + estado_proce_a +
              "&detalle_estado_a=" + detalle_estado_a +
              "&fojas_a=" + fojas_a +
              "&motivo_a=" + motivo_a;
    
            
            $.ajax({
              url:'../backend/actualizarDatos.php',
              type: 'POST',
              data: cadena,
              success: function(dat){
                console.log(cadena);
               console.log('enviado');
             //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
                mostrar();
                alertify.success("modificado");
                  
              }
            });

           
}

$('#update').click(function(){
  actualizarDatos();
});

function delegar(datos){



  id=$('#change').attr('name');
  console.log(name);


  usuario = $('input:radio[name=cmethod]:checked').val();
  console.log(usuario);

  cadena =  "id=" + id +
            "&asistente=" + usuario;

  $.ajax({
    url:'../backend/delegarUser.php',
    type: 'GET',
    data: cadena,
    success: function(dat){
      
     console.log('DELEGADO');
   //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
      mostrar();
      alertify.success("Registro Delegado");
        
    }
  });
  
}

$('#delegar').click(function(){
  delegar();
});



function ConfirmarArchivar(id){
  alertify.confirm('Archivar Datos', '¿Estás seguro de archivar este registro?', 
                  function(){ ArchivarDatos(id) }
                , function(){ alertify.error('Cancel')});
}

function ArchivarDatos(id){

  cadena="id=" +id;

  $.ajax({
    url:'../backend/ArchivarDatos.php',
    type: 'POST',
    data: cadena,
    success: function(dat){
        
          mostrar();
          alertify.error("Registro Archivado"); 
       
    }
  });
};
function ConfirmarDesarchivar(id){
  alertify.confirm('Desarchivar Datos', '¿Estás seguro de Desarchivar este registro?', 
                  function(){ desarchivarDatos(id) }
                , function(){ alertify.error('Cancel')});
}
function desarchivarDatos(id){

  cadena="id=" +id;

  $.ajax({
    url:'../backend/desarchivarDatos.php',
    type: 'POST',
    data: cadena,
    success: function(dat){
        
          mostrarArchivados();
          alertify.success("Registro Desarchivado"); 
       
    }
  });
};
///////////////////////Eliminar///////////
function ConfirmarEliminar(id){
  alertify.confirm('Eliminar Datos', '¿Estás Seguro de eliminar este registro?', 
                  function(){ EliminarDatos(id) }
                , function(){ alertify.error('Cancel')});
}

function EliminarDatos(id){

  cadena="id=" +id;

  $.ajax({
    url:'../backend/eliminarDatos.php',
    type: 'POST',
    data: cadena,
    success: function(dat){
        
          mostrarArchivados();
          alertify.success("Registro Eliminado"); 
       
    }
  });
};



function InsertarTipo(){

  desc_tipo= $('#desc_tipo').val();

  cadena =    "desc_tipo=" + desc_tipo;

  if(desc_tipo == ''){
    $("#mensajeError").removeClass("d-none"); 
  }else{

    $.ajax({
      url:'../backend/insertarTabla.php',
      type: 'POST',
      data: cadena,
      success: function(texto){
        
          console.log(cadena);
          console.log('enviado');
        //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
            location.reload();
           alertify.success("Agregado");
        
          
      }
    });
  }           

}


function InsertarProce(){

  desc_proce= $('#desc_proce').val();

  cadena =    "desc_proce=" + desc_proce;
             
  if(desc_proce == ''){
    $("#mensajeError2").removeClass("d-none"); 
  }else{
              $.ajax({
                url:'../backend/insertarTabla.php',
                type: 'POST',
                data: cadena,
                success: function(dat){
                console.log(cadena);
                 console.log('enviado');
               //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
               location.reload();
               alertify.success("Agregado");
                    
                }
              });
      }
}


function InsertarTipoProce(){

  desc_tipo_proce= $('#desc_tipo_proce').val();

  cadena =    "desc_tipo_proce=" + desc_tipo_proce;
            

  if(desc_tipo_proce == ''){
    $("#mensajeError3").removeClass("d-none"); 
  }else{

              $.ajax({
                url:'../backend/insertarTabla.php',
                type: 'POST',
                data: cadena,
                success: function(dat){
                console.log(cadena);
                 console.log('enviado');
               //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
               location.reload();
               alertify.success("Agregado");
                    
                }
              });
    }
}

function InsertarCargo(){

  desc_cargo= $('#desc_cargo').val();

  cadena =    "desc_cargo=" + desc_cargo;
             
  if(desc_cargo == ''){
    $("#mensajeError4").removeClass("d-none"); 
  }else{
              $.ajax({
                url:'../backend/insertarTabla.php',
                type: 'POST',
                data: cadena,
                success: function(dat){
                console.log(cadena);
                 console.log('enviado');
               //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
                location.reload();
                alertify.success("Agregado");
                    
                }
              });
      }
}

function InsertarEstado(){

  desc_estado= $('#desc_estado').val();

  cadena =    "desc_estado=" + desc_estado;
             
  if(desc_estado == ''){
    $("#mensajeError5").removeClass("d-none"); 
  }else{
              $.ajax({
                url:'../backend/insertarTabla.php',
                type: 'POST',
                data: cadena,
                success: function(dat){
                console.log(cadena);
                 console.log('enviado');
               //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
               location.reload();
               alertify.success("Agregado");
                    
                }
              });
      }
}

function InsertarDetalle(){

  desc_detalle= $('#desc_detalle').val();

  cadena =    "desc_detalle=" + desc_detalle;
             
  if(desc_detalle == ''){
    $("#mensajeError6").removeClass("d-none"); 
  }else{
              $.ajax({
                url:'../backend/insertarTabla.php',
                type: 'POST',
                data: cadena,
                success: function(dat){
                console.log(cadena);
                 console.log('enviado');
               //  $('#insertar').html("<div class='alert alert-success'><strong>Bien!</strong></div>");
               location.reload();
               alertify.success("Agregado");
                        
                }
              });
    }
}





