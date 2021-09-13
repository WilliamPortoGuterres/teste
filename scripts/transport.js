var id = 0;

function calculaDistancia() {

    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()

    if (cep2.length == 8 && cep1.length == 8) {

        $.ajax({
            url: '../controles/localiza.php',
            type: 'POST',
            data: ({ cep1: cep1, cep2: cep2 }),
            success: function (response) {

                var obj = JSON.parse(response);

                $('#primeiraCoordenada').val("Lat " + obj[0].lat + " Lon " + obj[0].lon);
                $('#segundaCoordenada').val("Lat " + obj[1].lat + " Lon " + obj[1].lon);
                $('#distanciaCep').val(obj[2].km + " Km " + obj[2].metros + " metros");
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }


}
function buscaId(id) {

    $.ajax({
        url: '../controles/buscaId.php',
        type: 'POST',
        dataType: 'json',
        data: { 'id': id },

        success: function (response) {


            console.log(response)
            if (!response) {
                alert('nÃƒÂ£o deu');
            } else {

                $('#cepInicial').val(response.cepO)
                $('#cepFinal').val(response.cepD)
                $('#distanciaCep').val(response.distancia)

                calculaDistancia();
            }

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });

}

function salvar() {
    var fieldCep1 = '#cepInicial';
    var fieldCep2 = '#cepFinal';
    var fieldDistanciaCep = '#distanciaCep';
    var cep1 = $(fieldCep1).val()
    var cep2 = $(fieldCep2).val()
    var distanciaCep = $(fieldDistanciaCep).val();
    var cep1Valido = testaCep(fieldCep1);
    var cep2Valido = testaCep(fieldCep2);
    if (cep1Valido && cep2Valido) {
        var requisicao = { cep1, cep2, distanciaCep };
        if (id != null) {
            requisicao.id = id;
        }

        $.ajax({
            url: '../controles/insere.php',
            type: 'POST',
            data: requisicao,
            success: function (response) {
                alert(response);
                window.location.href = '../telas/home.php';
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }else{
        alert("Verifique os CEPs digitados!");
    }




}

$('#btnRegistra').click(function () {
    salvar();

});


function modificaControles(cep, respostaCoordenada, valido) {
    if (valido) {

        $(cep).css('border-color', '#00a000');
        $(respostaCoordenada).html('Cep valido');
        $(respostaCoordenada).css('color', '#00a000');
    } else {
        $(cep).css('border-color', '#FF0000');
        $(respostaCoordenada).html('Cep invalido');
        $(respostaCoordenada).css('color', '#FF0000');
    }


}

function testaCep(cep) {
    var localCep = $(cep).val();
    if (localCep.length == 8) {
        return $.ajax({
            url: '../controles/testaExistencia.php',
            type: 'POST',
            async: false,
            data: ({ cep: $(cep).val() }),
            success: function (response) {
                return response;

            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                return false;
            }
        });
    }
    return false;
    


}




$('#cepInicial').keyup(function () {
    var field = "#cepInicial";
    var retorno = '#respostaPrimeiraCoordenada'
    var cep1 = $('input[name="cepInicial"]').val()
    if (cep1.length != 8) {
        $(field).css('background-color', '#fff');
        $(field).css('border-color', '#ced4da');
        $(retorno).html('');

    }

    else {
        testaCep(field).done(function(result){
            debugger;
            let valido = JSON.parse(result);
            modificaControles(field, retorno, valido);
        });

        

    }


});

$('#cepFinal').keyup(function () {
    var field = '#cepFinal';
    var retorno = '#respostaSegundaCoordenada';
    var cep2 = $('input[name="cepFinal"]').val()
    if (cep2.length != 8) {
        $('#cepFinal').css('background-color', '#fff');
    }

    else {
        testaCep(field).done(function(result){
            debugger;
            let valido = JSON.parse(result);
            modificaControles(field, retorno, valido);
        });

    }
});

$('#localizaCalcula').click(function () {
    calculaDistancia();
});

$(document).ready(function () {

    url = new URL(window.location.href);
    id = url.searchParams.get('id')
    if (id != null) {
        buscaId(id)
    }
});



