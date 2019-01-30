<?php

//fetch.php

$api_url = "http://gabrielqa.pe/AmbienteWeb2/wp2/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';


 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row->nombre.'</td>
   <td>'.$row->apellido.'</td>
   <td>'.$row->correo_electronico.'</td>
   <td>'.$row->direccion.'</td>
   <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
   <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
  </tr>
  ';
 }

echo $output;

?>
