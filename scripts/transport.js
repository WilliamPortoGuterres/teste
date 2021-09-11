$('#btn1').click(function () {

    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    
    $.ajax({
        url: '../controles/localiza.php',
        type: 'POST',
        data: ({ cep1: cep1, cep2: cep2 }),
        success: function (response) {
            $('#distanciaCep').html(response);
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
                var response2= "terra"
                $('#primeiraCoordenada').html(response2);     
                
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

});