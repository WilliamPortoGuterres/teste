function deletaCep(id) {

    $.ajax({
        url: '../controles/delete.php',
        type: 'POST',
        data: { id },
        success: function (response) {
            if (response == 'deletado') {

                alert('Deletado com sucesso!');
                listaCep();
            } else {
                alert('Não foi possivel deletar');

            }
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });



}