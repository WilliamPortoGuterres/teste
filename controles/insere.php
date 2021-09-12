<?php


include("conecta.php");
$cepOrigem= $_POST['cep1'];
$cepDestino= $_POST['cep2'];
$distanciaCalculada= $_POST['distanciaCep'];



$dados= "INSERT INTO dados (`cepOrigem`,`cepDestino`,`distanciaCalculada`,`horaAlteracao`) 
VALUES ('$cepOrigem','$cepDestino','$distanciaCalculada',NOW())";
$resultado_usuario= mysqli_query($conn,$dados);
if(mysqli_insert_id($conn)){
	echo 'cadastrado';
}else{
	
    echo 'não cadastrado';
};





?>