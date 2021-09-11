<?php


$coordenada1= json_decode( $resposta[1]);
$coordenada2= json_decode( $resposta[2]);

//$coordenada1= explode(" ",$coordenada1);
//$coordenada2= explode(" ",$coordenada2);

class calculaDistancia {
    
 public static function distancia($lat1, $lon1, $lat2, $lon2){
        
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);
        
        $latD = $lat2 - $lat1;
        $lonD = $lon2 - $lon1;
        
        $dist = 2 * asin(sqrt(pow(sin($latD / 2), 2) +
        cos($lat1) * cos($lat2) * pow(sin($lonD / 2), 2)));
        $dist = $dist * 6371;
        return number_format($dist, 2, '.', '');
    }
};
$calculaDistancia=new calculaDistancia;
$resposta[2]=  $calculaDistancia-> distancia($coordenada1->lat,$coordenada1->lon, $coordenada2->lat,$coordenada2->lon) ;

$resposta[0]=$coordenada1;
$resposta[1]=$coordenada2;

echo  json_encode($resposta)  ;


?>