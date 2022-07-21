<?php

//action.php;

$connect = new PDO("mysql:host=localhost;dbname=gestion-surveillances", "root", "");

if(isset($_POST["action"]))
{
 if($_POST["action"] == 'fetch_data')
 {
  $query = "SELECT * FROM affecation";

  $statement = $connect->prepare($query);

  $statement->execute();

  while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
   $data[] = $row;
  }

  echo json_encode($data);
 }

 if($_POST['action'] == 'update')
 {
  for($count = 0;  $count < count($_POST["id_affectation_array"]); $count++)
  {
   $query = "UPDATE affectation SET date_aff = '".($count+1)."' WHERE id_affectation = '".$_POST["id_affectation_array"][$count]."'";
   $statement = $connect->prepare($query);
   $statement->execute();
  }
 }
}

?>