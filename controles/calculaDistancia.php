<?php

//$coordenada1='-30.03417  -51.18121';
//$coordenada2='-29.92453  -51.13568';


$coordenada1= explode(" ",$_SESSION['coordenada1']);
$coordenada2= explode(" ",$_SESSION['coordenada2']);

class calculaDistancia{
    
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
echo $calculaDistancia-> distancia($coordenada1[0],$coordenada1[1], $coordenada2[0],$coordenada2[1]) ;


session_destroy();


?>