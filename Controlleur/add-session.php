<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\session.php';
	$ida = $_SESSION['id'];

	if (isset($_POST['suivant'])) {
		$debut = $_POST['dated'];
		$fin = $_POST['datef'];
		$annee = $_POST['anneeu'];
		$nom = $_POST['nomsession'];
		$type = $_POST['typesession'];
		$etat = $_POST['etat'];

		$ses = new Session();
		$res = $ses->insertion($debut, $fin, $nom, $type, $annee, $etat, $ida);
		if ($res) {
			session_start();
			$id_session = $ses->recuperer_idsession();
			$_SESSION['id_session'] = $id_session;
			header('location: ..\Controlleur\add-planification.php');
		}
		else{
			header('location: ..\Controlleur\affiche-planning.php');
		}
	}
	include '..\Vue\add-session.php';
?>