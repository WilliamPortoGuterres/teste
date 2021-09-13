

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/bootstrap.css">
    <link rel="stylesheet" href="./../css/meu.css">

    <title>teste</title>
</head>

<body>
    <div class="container">
        <?php include(dirname(__DIR__) . "/telas/navbar.php") ?>
        <br>
        
        <div class="row ">
        <div class="col-sm-1 "></div>
            <div class="col-sm">
                <form action="#" id="form" method="post">
                    <label for="cepInicial">Cep inicial</label>
                    <input type="text" name="cepInicial" id="cepInicial" class="cep form-control">
                    <div id="respostaPrimeiraCoordenada"></div>



                    <label for="primeiraCoordenada">Primeira coordenada</label>
                    <input type="text" name="primeiraCoordenada" id="primeiraCoordenada" class="form-control" readonly>
                    <br>

                    <label for="cepFinal">Cep final</label>
                    <input type="text" name="cepFinal" id="cepFinal" class="cep form-control">

                    <label for="segundaCoordenada">Segunda coordenada</label>
                    <input type="text" name="segundaCoordenada" id="segundaCoordenada" class="form-control" readonly>
                    <div id="respostaSegundaCoordenada"></div>
                    <br>

                    <label for="distanciaCep">Distancia entre os endereços </label>
                    <input type="text" name="distanciaCep" id="distanciaCep" class="form-control">

                    <br>


                    <div class="text-right" >
                        
                        <button type="button" id="localizaCalcula" class="btn btn-primary">Calcula</button>
                        <button type="button" id="btnRegistra" class="btn btn-primary">Registra</button>
                        <a  href="./home.php"><button type="button" href="./home.php" class="btn btn-primary">Retorna</button></a>
                    </div>
                 



                </form>
            </div>
            <div class="col-sm-1 "></div>   
        </div>
        <?php include((dirname(__DIR__) . "/telas/footer.php"));  ?>
    </div>
    
    <?php include((dirname(__DIR__) . "../scripts/scriptFormulario.php"));  ?>

</body>

</html>