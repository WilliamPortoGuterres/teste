<?php
include("conecta.php");
$cepOrigem= $_POST['cep1'];
$cepDestino= $_POST['cep2'];
$distanciaCalculada= $_POST['distanciaCep'];
$dados='';
$id=0;

if(isset($_POST['id'])){
    
    $id=$_POST['id'];
    $dados= "UPDATE `dados` SET `cepOrigem`='$cepOrigem',`cepDestino`='$cepDestino',
    `distanciaCalculada`='$distanciaCalculada',`horaAlteracao`=NOW() where`id_dados`='$id' ";


}else{

$dados= "INSERT INTO dados (`cepOrigem`,`cepDestino`,`distanciaCalculada`) 
VALUES ('$cepOrigem','$cepDestino','$distanciaCalculada')";



}


if (mysqli_connect_errno()) {
    printf("falha na conexão: %s\n", mysqli_connect_error());
    exit();
}

$resultado_usuario= mysqli_query($conn,$dados);

if($resultado_usuario){
	echo $id==0?'cadastrado':'atualizado';
    
}else{
	
    echo $id==0?'não cadastrado':'não atualizado';
};

mysqli_close($conn);
