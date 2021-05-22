//------------------------personal---------------------------------------
$(document).ready(function() {
var id_user, opcion;
opcion = 4;
    
tablaUsuarios = $('#tablaUsuarios').DataTable({ 
    dom: 'Bfrtip',
        buttons: [
            //'excel', 
            //'pdf', 
            'print'
        ],
    "ajax":{            
        "url": "../db/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_user"},
        {"data": "nombre"},
        {"data": "apellido"},
        {"data": "dependencia"},
        {"data": "username"},
        {"data": "password"},
        {"data": "privilegio"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'>Editar</button><button class='btn btn-danger btn-sm btnBorrar'>Eliminar</button></div></div>"}
    ],
    "language": { 
        "sProcessing": "Procesando...", 
        "sLengthMenu": "Mostrar _MENU_ registros", 
        "sZeroRecords": "No se encontraron resultados", 
        "sEmptyTable": "Ningún dato disponible en esta tabla", 
        "sInfo":   "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
        "sInfoEmpty":  "Mostrando registros del 0 al 0 de un total de 0 registros", 
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
        "sInfoPostFix": "", 
        "sSearch":  "Buscar:", 
        "sUrl":   "", 
        "sInfoThousands": ",", 
        "sLoadingRecords": "Cargando...", 
        "oPaginate": { 
         "sFirst": "Primero", 
         "sLast": "Último", 
         "sNext": "Siguiente", 
         "sPrevious": "Anterior" 
        }, 
        "oAria": { 
         "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
         "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
        } 
       } 
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    id_user=$.trim($('#id_user').val());
    nombre = $.trim($('#nombre').val());    
    apellido = $.trim($('#apellido').val());
    dependencia = $.trim($('#dependencia').val());    
    username = $.trim($('#username').val());    
    password = $.trim($('#password').val());
    tipo_user = $.trim($('#tipo_user').val());              
        $.ajax({
          url: "../db/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id_user:id_user, nombre:nombre, apellido:apellido, dependencia:dependencia, username:username, password:password , tipo_user:tipo_user, opcion:opcion},    
          success: function(data) {
                console.log(data);
                tablaUsuarios.ajax.reload(null, false);
           },
           error: function(){
               alert("Revise sus datos");
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){	
    $("#formUsuarios").trigger("reset");	        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id_user = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    dependencia = fila.find('td:eq(3)').text();
    username = fila.find('td:eq(4)').text();
    password = fila.find('td:eq(5)').text();
    tipo_user = fila.find('td:eq(6)').text();
    $("#id_user").val(id_user);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#dependencia").val(dependencia);
    $("#username").val(username);
    $("#password").val(password);
    $("#tipo_User").val(tipo_user);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_user = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_user+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../db/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_user:id_user},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });

 $(".cerrarModal").click(function(){
    $("#modalCRUD").modal('hide')
  });
  
});

//------------------------VEHICULOS---------------------------------------
$(document).ready(function(){
    var id_auto, opcion;
    opcion=8;

    tablaVehiculos=$('#tablaVehiculos').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        "ajax":{
            "url":"../db/crud.php",
            "method": 'POST',
            "data":{opcion:opcion},
            "dataSrc":""
        },
        "columns":[
            {"data": "id_auto"},
            {"data": "marca"},
            {"data": "modelo"},
            {"data": "no_placas"},
            {"data": "dependencia_autos"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditarAuto'>Editar</button><button class='btn btn-danger btn-sm btnBorrarAuto'>Eliminar</button></div></div>"}
        ],
        "language": { 
            "sProcessing": "Procesando...", 
            "sLengthMenu": "Mostrar _MENU_ registros", 
            "sZeroRecords": "No se encontraron resultados", 
            "sEmptyTable": "Ningún dato disponible en esta tabla", 
            "sInfo":   "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
            "sInfoEmpty":  "Mostrando registros del 0 al 0 de un total de 0 registros", 
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
            "sInfoPostFix": "", 
            "sSearch":  "Buscar:", 
            "sUrl":   "", 
            "sInfoThousands": ",", 
            "sLoadingRecords": "Cargando...", 
            "oPaginate": { 
             "sFirst": "Primero", 
             "sLast": "Último", 
             "sNext": "Siguiente", 
             "sPrevious": "Anterior" 
            }, 
            "oAria": { 
             "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
             "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
            } 
           } 
    });

    var fila;
    $('#formVehiculos').submit(function(e){
        e.preventDefault();
        id_auto=$.trim($('#id_auto').val());
        marca=$.trim($('#marca').val());
        modelo=$.trim($('#modelo').val());
        no_placas=$.trim($('#no_placas').val());
        dependencia_auto=$.trim($('#dependencia_auto').val());

            $.ajax({
                url: "../db/crud.php",
                type: "POST",
                datatype: "json",
                data: { id_auto:id_auto, marca:marca, modelo:modelo, no_placas:no_placas, dependencia_auto:dependencia_auto, opcion:opcion},
                success: function(data){
                
                    tablaVehiculos.ajax.reload(null, false);
                }
            });
        $('#modalCRUDAUTO').modal('hide');
    });

    $("#btnNuevoAuto").click(function(){
        opcion = 5;
        
        $("#formVehiculos").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-tittle").text("Alta de Vehiculos");
        $('#modalCRUDAUTO').modal('show');
    });

    $(document).on("click", ".btnEditarAuto", function(){
        $("#formVehiculos").trigger("reset");
        opcion = 6;
        fila=$(this).closest("tr");
        id_auto=parseInt(fila.find('td:eq(0)').text());
        marca=fila.find('td:eq(1)').text();
        modelo=fila.find('td:eq(2)').text();
        no_placas=fila.find('td:eq(3)').text();
        dependencia_auto=fila.find('td:eq(4)').text();
        $("#id_auto").val(id_auto);
        $("#marca").val(marca);
        $("#modelo").val(modelo);
        $("#no_placas").val(no_placas);
        $("#dependencia_auto").val(dependencia_auto);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-tittle").text("Editar Vehiculo");
        $('#modalCRUDAUTO').modal('show');
    });

    $(document).on("click", ".btnBorrarAuto", function(){
        fila=$(this);
        id_auto = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion=7;
        var respuesta=confirm("¿Esta seguro de borrar el registro "+ id_auto +" ?");
        if(respuesta){
            $.ajax({
                url:"../db/crud.php",
                type:"POST",
                datatype:"json",
                data: {opcion:opcion, id_auto:id_auto},
                success: function(){
                    tablaVehiculos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $(".cerrarModalAuto").click(function(){
        $("#modalCRUDAUTO").modal('hide')
      });
});

/************ Reportes **********/
$(document).ready(function() {
    var opcion =9;
    // Setup - add a text input to each footer cell
    $('#tablaReportes thead tr').clone(true).appendTo( '#tablaReportes thead' );
    $('#tablaReportes thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#tablaReportes').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Bfrtip',
        buttons: [
            //'excel', 
            //'pdf', 
            'print'
        ],
        "ajax":{
            "url":"../db/crud.php",
            "method": 'POST',
            "data":{opcion:opcion},
            "dataSrc":""
        },
        "columns":[
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "dependencia"},
            {"data": "id_auto"},
            {"data": "modelo"},
            {"data": "hora_entrada"},
            {"data": "hora_salida"}
        ],
        "language": { 
            "sProcessing": "Procesando...", 
            "sLengthMenu": "Mostrar _MENU_ registros", 
            "sZeroRecords": "No se encontraron resultados", 
            "sEmptyTable": "Ningún dato disponible en esta tabla", 
            "sInfo":   "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
            "sInfoEmpty":  "Mostrando registros del 0 al 0 de un total de 0 registros", 
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
            "sInfoPostFix": "", 
            "sSearch":  "Buscar:", 
            "sUrl":   "", 
            "sInfoThousands": ",", 
            "sLoadingRecords": "Cargando...", 
            "oPaginate": { 
             "sFirst": "Primero", 
             "sLast": "Último", 
             "sNext": "Siguiente", 
             "sPrevious": "Anterior" 
            }, 
            "oAria": { 
             "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
             "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
            } 
        }
    } );
} );
/************ Entradas/Salidas **********/
$(document).ready(function(){
    var opcion, fila;
    opcion=10;
    
    tablaEntradasSalidas=$('#tablaEntradasSalidas').DataTable({
        "ajax":{
            "url":"../db/crud.php",
            "method": 'POST',
            "data":{opcion:opcion},
            "dataSrc":""
        },
        "columns":[
            {"data": "id_user"},
            {"data": "id_auto"},
            {"data": "km_entrada"},
            {"data": "km_salida"},
            {"data": "gas_entrada"},
            {"data": "gas_salida"},
            {"data": "nota"},
            {"data": "hora_entrada"},
            {"data": "hora_salida"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditarEnter'>Editar</button></div></div>"}
        ],
        "language": { 
            "sProcessing": "Procesando...", 
            "sLengthMenu": "Mostrar _MENU_ registros", 
            "sZeroRecords": "No se encontraron resultados", 
            "sEmptyTable": "Ningún dato disponible en esta tabla", 
            "sInfo":   "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
            "sInfoEmpty":  "Mostrando registros del 0 al 0 de un total de 0 registros", 
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
            "sInfoPostFix": "", 
            "sSearch":  "Buscar:", 
            "sUrl":   "", 
            "sInfoThousands": ",", 
            "sLoadingRecords": "Cargando...", 
            "oPaginate": { 
             "sFirst": "Primero", 
             "sLast": "Último", 
             "sNext": "Siguiente", 
             "sPrevious": "Anterior" 
            }, 
            "oAria": { 
             "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
             "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
            } 
           } 
    });

    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
var hoy= new Date();
var fecha=hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var hour=hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
var hora=fecha+' '+hour;

$('#formINOUT').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    id_user = $.trim($('#id_user').val());    
    id_auto = $.trim($('#id_auto').val());
    km = $.trim($('#km').val());    
    gas = $.trim($('#gas').val());    
    nota = $.trim($('#nota').val());                          
        $.ajax({
          url: "../db/crud.php",
          type: "POST",
          datatype:"json",    
          data:  { id_user:id_user, id_auto:id_auto, km:km, gas:gas, nota:nota, hora:hora, opcion:opcion},    
          success: function(data) {
            tablaEntradasSalidas.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 11; //alta           
    id_user=null;
    $("#formINOUT").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar Entrada");
    $('.ocultar').hide();	
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditarEnter", function(){		        
    opcion = 12;//editar
    fila = $(this).closest("tr");	        
    id_user = parseInt(fila.find('td:eq(0)').text()); //capturo el ID	
    id_auto = parseInt(fila.find('td:eq(1)').text());	
    $("#formINOUT").trigger("reset");            
    $("#id_user").val(id_user);
    $("#id_auto").val(id_auto);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Agregar Salida");
    $('.ocultar').show();			
    $('#modalCRUD').modal('show');		   
});  
$(".cerrarModalInOut").click(function(){
    $("#modalCRUD").modal('hide')
  });

});

