<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';

    $id = $_GET['id_enseignant'];
  	$ens = new Enseignant();
  	$enseignant = $ens->recuperation($id);
  	include '..\Vue\update-enseignant.php';
?>