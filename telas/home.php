<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>teste</title>
</head>

<body>
    <div class="container">
        <?php include(dirname(__DIR__) . "/telas/navbar.php") ?>
        <div class="row">
           
            <div class="col-sm">
                <form action="#" id="form" method="post">
                    <label for="cepInicial">Cep inicial</label>
                    <input type="text" name="cepInicial" id="cepInicial" class="cep form-control">

                    <label for="primeiraCoordenada">Primeira coordenada</label>
                    <input type="text" name="primeiraCoordenada" id="primeiraCoordenada" class="form-control">

                    <br>

                    <label for="cepFinal">Cep final</label>
                    <input type="text" name="cepFinal" id="cepFinal" class="cep form-control">

                    <label for="segundaCoordenada">Segunda coordenada</label>
                    <input type="text" name="segundaCoordenada" id="segundaCoordenada" class="form-control">

                    <br>

                    <label for="distanciaCep">Distancia entre os endereços </label>
                    <input type="text" name="distanciaCep" id="distanciaCep" class="form-control">

                    <br>

                    <input type="button" value="resgistrar" id="btn1" class="btn btn-primary">
                    <input type="button" value="atualiza tabela" id="btn2" class="btn btn-primary">

                </form>
            </div>
            <div class="col-sm-6">
                <label for="">Distancias já calculadas</label>
<div >
<table  class="table table-responsive table-hover" id="distanciasCalculadas">


</table>


</div>
            </div>
        </div>
        <?php include((dirname(__DIR__) ."/telas/footer.php"));  ?>
    </div>
    <script src="../scripts/jquery-3.6.0.js"></script>
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/transport.js"></script>
    <script src="../scripts/jquery.mask.min.js"></script>
    <script src="../scripts/mascaras.js"></script>

</body>

</html>