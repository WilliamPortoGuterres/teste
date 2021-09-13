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
                alert('não deu');
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
    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    var distanciaCep = $('input[name="distanciaCep"]').val()
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


}

$('#btnRegistra').click(function () {


});

function validaForm() {

    var cep1 = $('input[name="cepInicial"]').val()
    var cep2 = $('input[name="cepFinal"]').val()
    if (cep1.length == 8 && cep2.length == 8) {

        return true;
    }
    return false;
}
function valida(cep, respostaCoordenada) {
    $.ajax({
        url: '../controles/testaExistencia.php',
        type: 'POST',
        data: ({ cep: $(cep).val() }),
        success: function (response) {
            if (response == 'existe') {

                $(cep).css('border-color', '#32CD32');
                $(respostaCoordenada).html('Cep confirmado');
                $(respostaCoordenada).css('color', ' #32CD32');

            } else {
                $(cep).css('border-color', '#FF0000');
                $(respostaCoordenada).html('Cep invalido');
                $(respostaCoordenada).css('color', '#FF0000');

            }
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });

}



$('#cepInicial').keyup(function () {
    var cep1 = $('input[name="cepInicial"]').val()
    if (cep1.length != 8) {
        $('#cepInicial').css('background-color', '#fff');
        $('#cepInicial').css('border-color', '#ced4da');
        $('#respostaPrimeiraCoordenada').html('');

    }

    if (cep1.length == 8) {


        valida('#cepInicial', '#respostaPrimeiraCoordenada')
    }
});

$('#cepFinal').keyup(function () {
    var cep2 = $('input[name="cepFinal"]').val()
    if (cep2.length != 8) {
        $('#cepFinal').css('background-color', '#fff');
    }

    if (cep2.length == 8) {

        valida('#cepFinal', '#respostaSegundaCoordenada')

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




