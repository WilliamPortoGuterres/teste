<?php
include("./conecta.php");

$id_dados=$_POST['id'];
$dados= "delete from `dados` where`id_dados`='$id_dados' ";

$resultado_usuario= mysqli_query($conn,$dados);
if(mysqli_affected_rows($conn)>0){
	echo 'deletado';
}else{
	echo 'falha';
};

mysqli_close($conn);