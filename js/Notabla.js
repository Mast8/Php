/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';       
    
    $('.campoModificable').editable({        
        success: function(response, newValue) {
            respuesta = jQuery.parseJSON(response);
            if(respuesta.status === 'error') return respuesta.msg; //msg will be shown in editable form
        }        
    });  
    
   $('.fechaEditable').editable({
//       format: 'dd/mm/yyyy',
       formatSubmit: 'mm-dd-yyyy',
       viewformat: 'dd-mm-yyyy',       
        datepicker: {
             weekStart: 1            
            
        },
        success: function(response, newValue) {            
            respuesta = jQuery.parseJSON(response);            
            if(respuesta.status === 'error') return respuesta.msg; //msg will be shown in editable form
        } 
   });  
   
    
    //make status editable
    $('#status').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 2,
        source: [
            {value: 1, text: 'status 1'},
            {value: 2, text: 'status 2'},
            {value: 3, text: 'status 3'}
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });
    
    
    //Footable
    //$('.footable').footable();
    
    
});
