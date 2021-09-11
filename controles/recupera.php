<?php

include("./conecta.php");



$query = "SELECT * FROM `dados`" ;

$resultado = mysqli_query($conn, $query);


while($row = mysqli_fetch_assoc($resultado)){
   echo' 
<tr >
      <td ><a  name="atualiza" class="btn btn-primary" href="atualiza.php?id='.$row["id_dados"].'">editar</a></td>
      <td>'. $row["id_dados"] .'</td>
      <td>'. $row["cepOrigem"] .'</td>
      <td>'. $row["cepDestino"] .'</td>
      <td>'. $row["distanciaCalculada"] .'</td>
      <td>'. $row["horaCadastro"] .'</td>
      <td>'. $row["horaAlteracao"] .'</td>
      
</tr>'

			
;}


?>