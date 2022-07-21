<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';

	if (isset($_POST['enregistrer'])) {
		$id = $_POST['id'];
		$nom = $_POST['name'];
		$ref = $_POST['ref'];
		$cap = $_POST['capacite'];
		$nbet = $_POST['nb_et'];
		$nben = $_POST['nb_en'];
		$etat = $_POST['etat'];

		$loc = new Local();
		$res = $loc->modification($id, $nom, $ref, $cap, $nbet, $nben, $etat);
		if ($res) {
			header('location: affiche-local.php');
		}
		else{
			header('location: affiche-local.php');
		}
	}
	include '..\Vue\update-local.php';

?>