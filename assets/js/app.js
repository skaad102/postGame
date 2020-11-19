function comprobarEmail() {
    jQuery.ajax({
        url: "disponibilidad.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function (data) {
            $("#estadoemail").html(data);
        },
        error: function () {}
    });
}

function comprobarUsuario() {
    jQuery.ajax({
        url: "disponibilidad.php",
        data: 'user=' + $("#user").val(),
        type: "POST",
        success: function (data) {
            $("#estadouser").html(data);
        },
        error: function () {}
    });
}

$(document).ready(function() {

    var juego_id, opcion;
    opcion = 4;
        
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        "ajax":{            
            "url": "../conexion/crud.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "juego_id"},
            {"data": "nombre"},
            {"data": "juegoEstado"},
            {"data": "fechaSalida"},
            {"data": "fechaCracked"},
            {"data": "nombreCrack"},
            {"data": "linkDescarga"},
            {"data": "imagen"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para ingresar y Actualización
    $('#formJuegos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());    
        juegoEstado = $.trim($('#juegoEstado').val());
        fechaSalida = $.trim($('#fechaSalida').val());    
        fechaCracked = $.trim($('#fechaCracked').val());    
        nombreCrack = $.trim($('#nombreCrack').val());
        linkDescarga = $.trim($('#linkDescarga').val());
        imagen = $.trim($('#imagen').val());                            
            $.ajax({
              url: "../conexion/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {juego_id:juego_id, nombre:nombre, juegoEstado:juegoEstado, fechaSalida:fechaSalida, fechaCracked:fechaCracked, nombreCrack:nombreCrack ,linkDescarga:linkDescarga ,imagen:imagen ,opcion:opcion},    
              success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos antes de ingresar un juego
    $("#btnNuevo").click(function(){
        opcion = 1; //ingresar           
        juego_id=null;
        $("#formJuegos").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar Juego");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        juego_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        nombre = fila.find('td:eq(1)').text();
        juegoEstado = fila.find('td:eq(2)').text();
        fechaSalida = fila.find('td:eq(3)').text();
        fechaCracked = fila.find('td:eq(4)').text();
        nombreCrack = fila.find('td:eq(5)').text();
        linkDescarga = fila.find('td:eq(6)').text();
        imagen = fila.find('td:eq(7)').text();
        $("#nombre").val(nombre);
        $("#juegoEstado").val(juegoEstado);
        $("#fechaSalida").val(fechaSalida);
        $("#fechaCracked").val(fechaCracked);
        $("#nombreCrack").val(nombreCrack);
        $("#linkDescarga").val(linkDescarga);
        $("#imagen").val(imagen);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        juego_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		 
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+juego_id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "../conexion/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, juego_id:juego_id},    
              success: function() {
                  tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    
