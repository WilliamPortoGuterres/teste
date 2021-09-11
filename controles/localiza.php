<?php


 class localiza{

     
    public static function localizaCep($params){ 
        $key = '5DueZeGnlrtdiwGxHGS665qzwS5OmiXL';
        $uri="https://api.tomtom.com/search/2/search/".$params.".json?typeahead=false&limit=1&countrySet=br&lat=0&lon=0&idxSet=Str&key=".$key."";
         
        //$uri="https://api.tomtom.com/search/2/search/".$params.".json?typeahead=false&limit=1&countrySet=br&language=pt-BR&timeZone=iana&relatedPois=off&entityTypeSet=PostalCodeArea&key=".$key."" ;
         $type_request='GET';
         $request = curl_init();
         curl_setopt ($request, CURLOPT_URL, $uri); 
         curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
         curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, 5); 
         curl_setopt ($request, CURLOPT_CUSTOMREQUEST, $type_request); 
         $file_contents = curl_exec($request);
         curl_close($request);
         
         
         $informacao= (json_decode($file_contents,true));//transforma em arrey
         


         $resposta['lat']=$informacao['results'][0]['position']['lat'];
         
         $resposta['lon']=$informacao['results'][0]['position']['lon'];

         $resposta['postalCode']= $informacao['results'][0]['address']['extendedPostalCode'] ;
         
         return  json_encode($resposta);
        }
    }
$executa =new localiza;


if(isset($_POST['cep1']) && isset($_POST['cep2']) ){

$resposta[1]=  $executa->localizaCep($_POST['cep1']);
$resposta[2]=  $executa->localizaCep($_POST['cep2']);


include('calculaDistancia.php');

}
?>