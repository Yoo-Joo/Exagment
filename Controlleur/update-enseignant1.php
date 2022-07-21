<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\enseignant.php';

	if (isset($_POST['enregistrer'])) {
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$dept = $_POST['dept'];
		$crd = $_POST['crd'];
		$etat = $_POST['etat'];

		$ens = new Enseignant();
		$res = $ens->modification($id, $nom, $prenom, $mail, $dept, $crd, $etat);
		if ($res) {
			header('location: affiche-enseignant.php');
		}
		else{
			header('location: affiche-enseignant.php');
		}
	}
	include '..\Vue\update-enseignant.php';

?>