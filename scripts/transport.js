$('#btn1').click(function () {

    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    var distanciaCep = $('input[name="distanciaCep"]').val()
   
    
    $.ajax({
        url: '../controles/insere.php',
        type: 'POST',
        data: ({ cep1: cep1, cep2: cep2 ,distanciaCep:distanciaCep}),
        success: function (response) {
            alert(response);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});


$('#cepInicial').keyup(function () {
    var cep1 = $('input[name="cepInicial"]').val()
   if (cep1.length != 8) {
        $('#cepInicial').css('background-color', 'white');
   }

    if (cep1.length == 8) {


        $.ajax({
            url: '../controles/testaExistencia.php',
            type: 'POST',
            data: ({ cep1: cep1 }),
            success: function (response) {
                if (response == 'existe') {
                    $('#cepInicial').css('background-color', 'green');
                } if(response=='naoexiste'){
                    $('#cepInicial').css('background-color', 'red');

                }
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
});

$('#cepFinal').keyup(function () {
    var cep2 = $('input[name="cepFinal"]').val()
   if (cep2.length != 8) {
        $('#cepFinal').css('background-color', 'white');
   }

    if (cep2.length == 8) {


        $.ajax({
            url: '../controles/testaExistencia.php',
            type: 'POST',
            data: ({ cep2: cep2 }),
            success: function (response) {
                if (response == 'existe') {
                    $('#cepFinal').css('background-color', 'green');
                } if(response=='naoexiste'){
                    $('#cepFinal').css('background-color', 'red');

                }
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
});


$('#cepFinal').keyup(function () {
    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    
    if (cep2.length == 8 && cep1.length == 8)
    {
        
        
        
        $.ajax({
            url: '../controles/localiza.php',
            type: 'POST',
            data: ({ cep1: cep1 ,cep2: cep2 }),
            success: function (response) {   
               var obj = JSON.parse(response);
               
                $('#primeiraCoordenada').val("Lat "+obj[0].lat+" Lon "+obj[0].lon );     
                $('#segundaCoordenada').val("Lat "+obj[1].lat+" Lon "+obj[1].lon );  
                $('#distanciaCep').val(obj[2].km+" Km "+obj[2].metros+" metros" );  
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

});

$( document ).ready(function() {
      
    $.ajax({
        url: '../controles/recupera.php',
        type: 'POST',
        success: function (response) {   
           //var obj = JSON.parse(response);
           
            $('#distanciasCalculadas').html(response);     
           
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#atualizar').click(function () {
    var id=$('input[name="cepInicial"]').val()
    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    var distanciaCep = $('input[name="distanciaCep"]').val()
   
    
    $.ajax({
        url: '../controles/atualiza.php',
        type: 'POST',
        data: ({ cep1: cep1, cep2: cep2 ,distanciaCep:distanciaCep}),
        success: function (response) {
            alert(response);
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});
