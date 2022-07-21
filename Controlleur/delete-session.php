<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\session.php';

	$id = $_GET['id_session'];

	$ses = new Session();
	$session = $ses->suppression($id);
	if ($res) {
		header('location: affiche-planning.php');
	}
	else{
		header('location: affiche-planning.php');
	}
?>