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
        <div class="row">

        

            <div class="col-sm-12">
                <h3>Distancias já calculadas</h3>
                <br>

                    


                <a href="./formulario.php" class="btn btn-primary"> adicionar nova distancia</a>
                
                <div class="caixaTabela ">
                    <table class="table table-responsive table-hover" id="distanciasCalculadas">
                        <tbody>


                        </tbody>

                    </table>

                </div>
            </div>
            
        </div>
        <?php include((dirname(__DIR__) . "/telas/footer.php"));  ?>
    </div>

    <?php include((dirname(__DIR__) . "../scripts/scriptHome.php"));  ?>

</body>

</html>