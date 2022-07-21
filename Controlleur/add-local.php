<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';

	if (isset($_POST['ajouter'])) {
		$nom = $_POST['nom'];
		$ref = $_POST['ref'];
		$cap = $_POST['capacite'];
		$nbet = $_POST['nb_et'];
		$nben = $_POST['nb_en'];
		$etat = $_POST['etat'];

		$loc = new Local();
		$res = $loc->insertion($nom, $ref, $cap, $nbet, $nben, $etat);
		if ($res) {
			header('location: ..\Controlleur\affiche-local.php');
		}
		else{
			header('location: ..\Controlleur\affiche-local.php');
		}
	}
	include '..\Vue\add-local.html';
?>