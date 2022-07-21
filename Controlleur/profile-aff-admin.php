<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\admin.php';
    
	$id = $_SESSION['id'];
  	$ad = new Admin();
  	$admin = $ad->recuperation($id);
	
	if (isset($_POST['enregistrer'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['mail'];
		$mdp = $_SESSION['nmdp'];
		$update = $ad->modification($id, $nom, $prenom, $email, $mdp);
		if ($update) {
			header('location: admin-home');
		}
		else {
			echo "error";
		}
	}
	
  	include '..\Vue\profile-admin.php';
?>