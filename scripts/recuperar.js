


function listaCep() {


    $.ajax({
        url: '../controles/recupera.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            
            console.log(response)
                
            if (!response) {
                alert('Fornecedor não encontrado. Por favor verifiquei e tente novamente.');
            } else {
                var tabela = $("#distanciasCalculadas");
                var rows = "";
                tabela.find("tbody tr").remove();
                rows += '<tr>';
                rows += '<th>Cep de origem</th>';
                rows += '<th>Cep de destino</th>';
                rows += '<th>Distância</th>';
                rows += '<th>Data de registro</th>';
                rows += '<th>Data de atualização</th>';
                rows += '<th>Ações</th>';
                rows += '</tr>';
                response.forEach(function (item, index) {
                 
                    rows += "<tr>";
                    rows += " <td>" + item.cepO + "</td>";
                    rows += " <td>" + item.cepD + "</td>";
                    rows += " <td>" + item.distancia + "</td>";
                    rows += " <td>" + item.horaC + "</td>";
                    rows += " <td>" + item.horaA + "</td>";
                    rows += " <td> <a class='btn btn-primary' href='./formulario.php?id="+ item.id +" '>Editar</a> </td>";
                    rows += " <td> <button class='btn btn-primary' onclick='deletaCep("+item.id+")' >Deletar</button> </td>";


                    rows += "</tr>";
                });



                //tabela.find("tbody").append(rows);
                tabela.find("tbody").html(rows);
            }
        },
        error: function (xhr, status, error) {
            
           alert(xhr.responseText);
        }
    });
}


$(document).ready(function(){

listaCep();



})