<?php
include("./conecta.php");
function organiza($data){
    
    $temp=explode(' ',$data);
    $temp[0]= implode("/",array_reverse(explode("-",$temp[0])));
    
    $data=$temp[1];
    $data.=' ';
    $data.=$temp[0];
    return $data;
}
if(isset($_POST['id'])){

    $query = "SELECT * FROM `dados` where `id_dados`=".$_POST['id'] ;
    
    $resultado = mysqli_query($conn, $query);
    
    $retorno;
  
    while($row = mysqli_fetch_assoc($resultado)){
        
        
        $dados['id'] =$row["id_dados"] ;
        $dados['cepO'] =$row["cepOrigem"] ;
        $dados['cepD']= $row["cepDestino"] ;
        $dados['distancia']= $row["distanciaCalculada"] ;
        $dados['horaC']= organiza($row["horaCadastro"]) ;
        $dados['horaA']= organiza($row["horaAlteracao"]) ;
       $retorno=$dados;
        
    }

    echo  json_encode($retorno)  ;
    
    mysqli_close($conn);
    
    
    
}else{
    echo "passe um id por favor";
}
