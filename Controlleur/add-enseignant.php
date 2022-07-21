<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\enseignant.php';

	if (isset($_POST['ajouter'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$mdp = $_POST['mdp'];
		$dept = $_POST['dept'];
		$crd = $_POST['crd'];
		$etat = $_POST['etat'];

		$ens = new Enseignant();
		$res = $ens->insertion($nom, $prenom, $mail, $dept, $mdp, $crd, $etat);
		if ($res) {
			header('location: ..\Controlleur\affiche-enseignant.php');
		}
		else{
			header('location: ..\Controlleur\affiche-enseignant.php');
		}
	}
	include '..\Vue\add-enseignant.html';
?>