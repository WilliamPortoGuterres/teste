<?php
  
  
 if(isset($_POST['cep1'])){$cep1=$_POST['cep1'];}
 if(isset($_POST['cep2'])){$cep2=$_POST['cep2'];}
 
class testaExistencia{

    
  public static function testaCep($params){ 
        
        $key = 'cafd025c295ee1228840cc45c58b954c';
        $uri="https://www.cepaberto.com/api/v3/cep?cep=".$params;
        $type_request='GET';
        $request = curl_init();
        curl_setopt ($request, CURLOPT_HTTPHEADER, array('Authorization:Token token='.$key)); 
        curl_setopt ($request, CURLOPT_URL, $uri); 
        curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt ($request, CURLOPT_CUSTOMREQUEST, $type_request); 
        $file_contents = curl_exec($request);
        curl_close($request);
        if($file_contents!='{}'){
            
            return "existe";
        }else{
            
            return"naoexiste";
        }
    }
}
$executa= new testaExistencia;
    if(isset($cep1)){

    echo $executa->testaCep($cep1);
}
if(isset($cep2)){

    echo $executa->testaCep($cep2);
}
?>
