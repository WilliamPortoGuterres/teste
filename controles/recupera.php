<?php

include("./conecta.php");

if (mysqli_connect_errno()) {
    printf("falha na conexão: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM `dados`" ;

$resultado = mysqli_query($conn, $query);


$teste=array();
while($row = mysqli_fetch_assoc($resultado)){
   
   
        $dados['id'] =$row["id_dados"] ;
        $dados['cepO'] =$row["cepOrigem"] ;
        $dados['cepD']= $row["cepDestino"] ;
        $dados['distancia']= $row["distanciaCalculada"] ;
        $dados['horaC']= organiza($row["horaCadastro"]) ;
        $dados['horaA']= organiza($row["horaAlteracao"]) ;
        array_push( $teste,$dados);
  
    }
    echo  json_encode($teste)  ;

function organiza($data){

$temp=explode(' ',$data);
$temp[0]= implode("/",array_reverse(explode("-",$temp[0])));

$data=$temp[1];
$data.=' ';
$data.=$temp[0];
if($data== '00:00:00 00/00/0000'){

    return 'Não houve atualização';
}
return $data;
}
mysqli_close($conn);
