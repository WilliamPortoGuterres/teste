<?php


include("./conecta.php");



$dados= "INSERT INTO dados (cepOrigem,cepDestino,distanciaCalculada,horaAlteracao) 
VALUES (`$cepOrigem`,`$cepDestino`,`$distanciaCalculada`,`$horaAlteracao`)";
$resultado_usuario= mysqli_query($conn,$dados);
if(mysqli_insert_id($conn)){
	//resposta positiva
}else{
	//resposta negativa
};





?>