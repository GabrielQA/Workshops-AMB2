<?php

//Api.php

class API
{
 private $connect = '';

 function __construct()
 {
  $this->database_connection();
 }

 function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=api_rest", "root", "");
	}

 function fetch_all()
 {
  $query = "SELECT * FROM crud ORDER BY id";
  $statement = $this->connect->prepare($query);
  if($statement->execute())
  {
   while($row = $statement->fetch(PDO::FETCH_ASSOC))
   {
    $data[] = $row;
   }
   return $data;
  }
 }
 function insert()
 {
     if(isset($_POST["nombre"]))
     {
         $form_data = array(
             ':nombre'		=>	$_POST["nombre"],
             ':apellido'		=>	$_POST["apellido"],
             ':correo_electronico'		=>	$_POST["correo_electronico"],
             ':direccion'		=>	$_POST["direccion"]
         );
         $query = "
         INSERT INTO crud 
         (nombre, apellido, correo_electronico, direccion) VALUES 
         (:nombre, :apellido, :correo_electronico, :direccion)
         ";
         $statement = $this->connect->prepare($query);
         if($statement->execute($form_data))
         {
             $data[] = array(
                 'success'	=>	'1'
             );
         }
         else
         {
             $data[] = array(
                 'success'	=>	'0'
             );
         }
     }
     else
     {
         $data[] = array(
             'success'	=>	'0'
         );
     }
     return $data;
 }
 function fetch_single($id)
 {
  $query = "SELECT * FROM crud WHERE id='".$id."'";
  $statement = $this->connect->prepare($query);
  if($statement->execute())
  {
   foreach($statement->fetchAll() as $row)
   {
    $data['nombre'] = $row['nombre'];
    $data['apellido'] = $row['apellido'];
    $data['correo_electronico'] = $row['correo_electronico'];
    $data['direccion'] = $row['direccion'];
   }
   return $data;
  }
 }

 function update()
 {
  if(isset($_POST["nombre"]))
  {
   $form_data = array(
    ':nombre' => $_POST['nombre'],
    ':apellido' => $_POST['apellido'],
    ':correo_electronico' => $_POST['correo_electronico'],
    ':direccion' => $_POST['direccion'],
    ':id'   => $_POST['id']
   );
   $query = "
   UPDATE crud
   SET nombre = :nombre, apellido = :apellido, correo_electronico = :correo_electronico, direccion = :direccion
   WHERE id = :id
   ";
   $statement = $this->connect->prepare($query);
   if($statement->execute($form_data))
   {
    $data[] = array(
     'success' => '1'
    );
   }
   else
   {
    $data[] = array(
     'success' => '0'
    );
   }
  }
  else
  {
   $data[] = array(
    'success' => '0'
   );
  }
  return $data;
 }
}
function delete($id)
	{
		$query = "DELETE FROM crud WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
?>