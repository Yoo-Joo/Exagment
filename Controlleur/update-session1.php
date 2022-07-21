<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\session.php';

	if (isset($_POST['enregistrer'])) {
		$id = $_POST['id'];
		$dated = $_POST['dated'];
		$datef = $_POST['datef'];
		$annee = $_POST['anneeu'];
		$noms = $_POST['nomsession'];
		$types = $_POST['typesession'];
		$etat = $_POST['etat'];
        $ida = 1;

		$loc = new Session();
		$res = $loc->modification($id, $dated, $datef, $noms, $types, $annee, $etat, $ida);
		if ($res) {
			header('location: affiche-planning.php');
		}
		else{
            echo "erreur";
			//header('location: affiche-local.php');
		}
	}

	include '..\Vue\update-session.php';
?>