$(function (){
//    $('#contenedor').load("agregarUsuario.php");
    
    //Funcion 1: Carga una Página en el div contenedor al hace click al elemento con id=cargar
    $('#cargar').click(function (){
        $('#contenedor').load("agregarUsuario.php");    
    });
    
    $('#agregarPersona').click(function(){
        $('#container').load("agregarPersona.php");    
    });
    
    $('#modificarPersona').click(function(){
        $('#container').load("modificarPersona.php");    
    });
    
    $('#eliminarPersona').click(function(){
        $('#container').load("eliminarPersona.php");    
    });
    
    $('#miInfo').click(function(){
        $('#container').load("miInfo.php");    
    });
    
    //Funcion 2: Autocompletado en busqueda
    $('#buscar_usuario').autocomplete({
            source : 'autocompletarUsuario.php',
            select : function(event,ui){
                $('#mostrarUsuarios').slideUp('fast',function(){
                   $('#mostrarUsuarios').html(
                    "detalles usuario</h2><br/>"+
                    'nombre: '+ui.item.value+'<br/>'+                       
                    'telefono: '+ui.item.telefono+'<br/>'+
                    'fecha de nacimiento: '+ui.item.fecha_nacimiento

                    );                                                            
                });
                $('#mostrarUsuarios').slideDown('fast');
            }
    });
    
    
    $('table').footable({
        breakpoints: {
            tiny: 180,                
            phone: 256,
            medium: 512,
            tablet: 768,
            laptop: 1024
        }
    }).on('click','.row-delete',function(e){
          e.preventDefault();
        //get the footable object
        var footable = $('table').data('footable');

        //get the row we are wanting to delete
        var row = $(this).parents('tr:first');

        id = $(this).attr('id');        
        var dataString = 'id='+id;                  
        
        $.ajax({
            type: "GET",
            url: "ePersona.php",
            data: dataString,
            success: function(data) {                                
                
            }            
        });
        

        //delete the row
        footable.removeRow(row);
    });
    
    //$('table').footable().on('click', '.row-delete', function(e) {
        
//        e.preventDefault();
//        //get the footable object
//        var footable = $('table').data('footable');
//
//        //get the row we are wanting to delete
//        var row = $(this).parents('tr:first');
//
//        //delete the row
//        footable.removeRow(row);
    //});
    
    
    $(document).on("click",".paginaPersonas",function(){        
        var page = $(this).attr('data');        
        var dataString = 'pagina='+page+"&css_class=paginaPersonas&tipoResultado=";          
        $.ajax({
            type: "GET",
            url: "contenidoTablaPersonas.php",
            data: dataString,
            success: function(data) {                
                $('#mostrarUsuarios').fadeIn(1000).html(data).trigger('footable_redraw');                
            }            
        });
        $.ajax({
            type: "GET",
            url: "paginadorTablaPersonas.php",
            data: dataString,
            success: function(data){
                $('.pagination').fadeIn(1000).html(data);
            }
        });
    });
    
    $(document).on("click",".paginaPersonasModificar",function(){        
        var page = $(this).attr('data');        
        var dataString = 'pagina='+page+"&css_class=paginaPersonasModificar&tipoResultado=modificarPersonas";          
        $.ajax({
            type: "GET",
            url: "contenidoTablaPersonas.php",
            data: dataString,
            success: function(data) {                
                $('#mostrarUsuarios').fadeIn(1000).html(data+
                        "<script type='text/javascript' src='bootstrap/xeditable/js/bootstrap-editable.js'></script>"+
                        "<script type='text/javascript' src='js/tabla.js'></script>"
                        ).trigger('footable_redraw');                
            }            
        });
        $.ajax({
            type: "GET",
            url: "paginadorTablaPersonas.php",
            data: dataString,
            success: function(data){
                $('.pagination').fadeIn(1000).html(data);
            }
        });
    });
    
    $(document).on("click",".paginaPersonasEliminar",function(){        
        var page = $(this).attr('data');        
        var dataString = 'pagina='+page+"&css_class=paginaPersonasEliminar&tipoResultado=eliminarPersonas";          
        $.ajax({
            type: "GET",
            url: "contenidoTablaPersonas.php",
            data: dataString,
            success: function(data) {                
                $('#mostrarUsuarios').fadeIn(1000).html(data).trigger('footable_redraw');                
            }            
        });
        $.ajax({
            type: "GET",
            url: "paginadorTablaPersonas.php",
            data: dataString,
            success: function(data){
                $('.pagination').fadeIn(1000).html(data);
            }
        });
    });
    
    //Funcion 3: Autocompletado cuando el elemento se agregó después
    $(document).on("keydown.autocomplete","#buscar_usuario",function(){
         $(this).autocomplete({                    
            source : 'buscarUsuarios.php',
            select : function(event,ui){
                $('#mostrarUsuarios').slideUp('fast',function(){                   
                    $('#mostrarUsuarios').html(
                    "<tr>"+
                    "<td data-toggle='true' class='footable-first-column'><span class='footable-toogle'></span>"+ui.item.nombres+"</td>"+
                    "<td>"+ui.item.apellidos+"</td>"+
                    "<td data-hide='tiny,phone,medium' class='footable-last-column'>"+ui.item.fecha_nacimiento+"</td>"+
                    "<td data-hide='tiny,phone,medium,tablet' class='footable-last-column'>"+ui.item.fecha_conversion+"</td>"+ 
                    "<td data-hide='tiny,phone,medium,tablet' class='footable-last-column'>"+ui.item.fecha_bautismo+"</td>"+ 
                    "<td data-hide='tiny'>"+ui.item.telefono+"</td>"+
                    "<td data-hide='tiny,phone,medium,tablet'>"+ui.item.correo+"</td>"+                    
                    "<td data-hide='tiny,phone,medium,tablet'>"+ui.item.direccion+"</td>"+                    
                    "</tr>"
                    ).trigger('footable_redraw');                    
                });
                $('#mostrarUsuarios').slideDown('fast');
                $('.pagination').html("");
            }                        
        });
    });
    
    //Funcion 3: Autocompletado cuando el elemento se agregó después
    $(document).on("keydown.autocomplete","#buscar_usuario_modificar",function(){
         $(this).autocomplete({                    
            source : 'buscarUsuarios.php',
            select : function(event,ui){
                $('#mostrarUsuarios').slideUp('fast',function(){
                   $('#mostrarUsuarios').html(                    
                    "<tr>"+
                    "<td><div style='cursor: pointer;' id='nombres' class='campoModificable' data-type='text' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Ingrese Nombre'>"+ui.item.nombres+"</div></td>"+
                    "<td><div style='cursor: pointer;' id='apellidos' class='campoModificable' data-type='text' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Ingrese Apellidos'>"+ui.item.apellidos+"</div></td>"+
                    "<td><div style='cursor: pointer;' href='#' id='nacimiento' class='fechaEditable' data-type='date' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Fecha Nacimiento'>"+ui.item.fecha_nacimiento+"</div></td>"+                    
                    "<td><div style='cursor: pointer;' href='#' id='conversion' class='fechaEditable' data-type='date' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Fecha Conversion'>"+ui.item.fecha_conversion+"</div></td>"+
                    "<td><div style='cursor: pointer;' href='#' id='bautismo' class='fechaEditable' data-type='date' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Fecha Bautismo'>"+ui.item.fecha_bautismo+"</div></td>"+
                    "<td><div style='cursor: pointer;' id='telefono' class='campoModificable' data-type='text' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Ingrese Telefono'>"+ui.item.telefono+"</div></td>"+
                    "<td><div style='cursor: pointer;' id='correo' class='campoModificable' data-type='text' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Ingrese Correo'>"+ui.item.correo+"</div></td>"+
                    "<td><div style='cursor: pointer;' id='direccion' class='campoModificable' data-type='text' data-placement='bottom' data-pk="+ui.item.id+" data-url='mPersonas.php' data-title='Ingrese Dirección'>"+ui.item.direccion+"</div></td>"+                                        
                    "</tr>"+
                    "<script type='text/javascript' src='bootstrap/xeditable/js/bootstrap-editable.js'></script>"+
                    "<script type='text/javascript' src='js/tabla.js'></script>"
                    );                                                            
                });
                $('#mostrarUsuarios').slideDown('fast');
                $('.pagination').html("");
            }                        
        });
    });
    
    //Funcion 3: Autocompletado cuando el elemento se agregó después
    $(document).on("keydown.autocomplete","#buscar_usuario_eliminar",function(){
         $(this).autocomplete({                    
            source : 'buscarUsuarios.php',
            select : function(event,ui){
                $('#mostrarUsuarios').slideUp('fast',function(){
                   $('#mostrarUsuarios').html(                    
                   "<tr>"+
                    "<td data-toggle='true' class='footable-first-column'><span class='footable-toogle'></span>"+ui.item.nombres+"</td>"+
                    "<td>"+ui.item.apellidos+"</td>"+
                    "<td data-hide='tiny,phone,medium' class=''>"+ui.item.fecha_nacimiento+"</td>"+
                    "<td data-hide='tiny,phone,medium,tablet' class=''>"+ui.item.fecha_conversion+"</td>"+ 
                    "<td data-hide='tiny,phone,medium,tablet' class=''>"+ui.item.fecha_bautismo+"</td>"+ 
                    "<td data-hide='tiny'>"+ui.item.telefono+"</td>"+
                    "<td data-hide='tiny,phone,medium,tablet'>"+ui.item.correo+"</td>"+                    
                    "<td data-hide='tiny,phone,medium,tablet'>"+ui.item.direccion+"</td>"+                    
                    "<td class='footable-last-column text-center'><a id='"+ui.item.id+"' class='row-delete'><span class='glyphicon glyphicon-remove'></span></a></td>"+
                    "</tr>"
                    ).trigger('footable_redraw');                                                            
                });
                $('#mostrarUsuarios').slideDown('fast');
                $('.pagination').html("");
            }                        
        });
    });
    
    $(document).on("click","#meses",function(){        
        var mes = $(this).val();
        if(mes!=="0"){
            var dataString = 'mes='+mes;
            $.ajax({
                type: "GET",
                url: "buscarUsuarios.php",
                data: dataString,
                success: function(data){                
                    $('#mostrarUsuarios').slideUp('fast',function(){
                        $('#mostrarUsuarios').html(data).trigger('footable_redraw');                
                    });
                    $('#mostrarUsuarios').slideDown('fast');
                    $('.pagination').html("");                
                }
            });    
        }
    });
    
    
    $('#barraPrincipal').on('shown.bs.collapse', function () {        
        $("#spanBP").removeClass("glyphicon-plus").addClass("glyphicon-minus");
     });

     $('#barraPrincipal').on('hidden.bs.collapse', function () {         
        $("#spanBP").removeClass("glyphicon-minus").addClass("glyphicon-plus");
     });
    
    
});


