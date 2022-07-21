<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\contrainte.php';

	$id = $_GET['id_enseignant'];

	$con = new Contrainte();
	$contrainte = $con->suppression($id);
	if ($res) {
		header('location: affiche-contrainte1.php');
	}
	else{
		header('location: affiche-contrainte1.php');
        echo "error";
	}
	

?>