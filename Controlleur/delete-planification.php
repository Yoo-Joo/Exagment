<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\planification.php';

    $id = $_GET['id_planification'];
    $ids = $_GET['id_session'];
	$ses = new Planification();
	$planification = $ses->suppression($id);
	if ($res) {
		header('location: affiche-planification.php');
	}
	else{
		header('location: affiche-planification.php');
	}
?>