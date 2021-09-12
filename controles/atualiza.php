<?php
include("./conecta.php");


$dados= "UPDATE `dados` SET `cepOrigem`='$cepOrigem',`cepDestino`='$cepDestino',`distanciaCalculada`='$distanciaCalculada',
`horaAlteracao`='$horaAlteracao'where`id_dados`='$id_dados' ";

$resultado_usuario= mysqli_query($conn,$dados);
if(mysqli_affected_rows($conn)>0){
	//resposta positiva
}else{
	//resposta negativa
};

mysqli_close($conn);