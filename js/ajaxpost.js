/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// bind to the submit event of our form
//$("#formularioAgregarPersona").submit(function(event){
//    alert("ok");
//
//});

$(document).on("submit","#formularioAgregarPersona",function(){
    // abort any pending request
    
    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();

    // let's disable the inputs for the duration of the ajax request
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    $.ajax({
        type: "post",
        url: "aPersona.php",        
        data: serializedData,
        success: function(datos){
            datos = jQuery.parseJSON(datos);
            if(datos==="¡Persona Agregada!"){
                $("#resultado").html("<font color='green'>"+datos+"</font>");
            }else{
                $("#resultado").html("<font color='red'>"+datos+"</font>");
            }            
        },
        error:function(){
            $("#resultado").html('Los datos no se pudieron enviar');
        }
    });

    
   // reenable the inputs
   $inputs.prop("disabled", false);
    

    // prevent default posting of form
    event.preventDefault();
});

// bind to the submit event of our form
$("#autenticarse").submit(function(event){
    // abort any pending request
    
    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();

    // let's disable the inputs for the duration of the ajax request
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    $.ajax({
        type: "post",
        url: "login.php",        
        data: serializedData,
        success: function(data){
            if(data==='Bienvenido'){
             window.location.replace('areaUsuarios.php');   
            }else{
                $("#resultadoLogin").html(data);
            }            
        },
        error:function(){
            $("#resultadoLogin").html('Los datos no se pudieron enviar');
        }
    });

    
   // reenable the inputs
   $inputs.prop("disabled", false);
    

    // prevent default posting of form
    event.preventDefault();

});

$("#password").keydown(function (){
    $("#resultadoLogin").html("");
});

$(".formulario").keydown(function (){
    $("#resultado").html("");
});

$(function() {
    $( ".datepicker" ).pickadate({
        min: new Date(1900,1,1), //Limita la fecha mínima al año 1900
        max: true,               //Limita la fecha máxima al día de hoy
        selectYears: 80,         //Despliega un menu con un tamaño de 80 años
        selectMonths: true       //Despliega el menu de los meses
    });
});

