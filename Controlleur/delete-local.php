<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';

	$id = $_GET['id_local'];

	$loc = new Local();
	$locaux = $loc->suppression($id);
	if ($res) {
		header('location: affiche-local.php');
	}
	else{
		header('location: affiche-local.php');
	}
	

?>