<?php

include("./conecta.php");



$query = "SELECT * FROM `dados`" ;

$resultado = mysqli_query($conn, $query);

echo '  <thead>
<tr>
   <th scope="col">Editar</th>
    <th scope="col">Id</th>
    <th class="text-nowrap"scope="col">Cep de origem</th>
    <th class="text-nowrap"scope="col">cep de destino</th>
    <th class="text-nowrap" scope="col">Distancia calculada</th>
    <th class="text-nowrap" scope="col">Hora do cadastro</th>
    <th class="text-nowrap" scope="col">Hora que foi atualizado</th>
</tr>
</thead>';


while($row = mysqli_fetch_assoc($resultado)){
   echo' 
<tr >
      <td id="util '. $row["id_dados"] .'" ><button id="atualizar" class="btn btn-primary" >Atualizar</button></td>
      <td>'. $row["id_dados"] .'</td>
      <td>'. $row["cepOrigem"] .'</td>
      <td>'. $row["cepDestino"] .'</td>
      <td>'. $row["distanciaCalculada"] .'</td>
      <td>'. $row["horaCadastro"] .'</td>
      <td>'. $row["horaAlteracao"] .'</td>
      
</tr>'

			
;}


?>