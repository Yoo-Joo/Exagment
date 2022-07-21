<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\planification.php';
	include '..\Modele\filiere.php';
	include '..\Modele\semestre.php';
	include '..\Modele\matiere.php';

    $id = $_GET['id_planification'];
  	$pla = new Planification();
  	$planification = $pla->recuperation($id);
  	include '..\Vue\update-planification.php';
?>