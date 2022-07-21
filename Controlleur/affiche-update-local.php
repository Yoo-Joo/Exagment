<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\local.php';

    $id = $_GET['id_local'];
  	$loc = new Local();
  	$locaux = $loc->recuperation($id);
  	include '..\Vue\update-local.php';
?>