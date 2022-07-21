<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\enseignant.php';

	$id = $_GET['id_enseignant'];

	$ens = new Enseignant();
	$enseignant = $ens->suppression($id);
	if ($res) {
		header('location: affiche-enseignant.php');
	}
	else{
		header('location: affiche-enseignant.php');
	}
	

?>