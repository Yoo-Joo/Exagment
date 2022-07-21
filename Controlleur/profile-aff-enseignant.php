<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';
    
	$id = $_SESSION['id'];
  	$ens = new Enseignant();
  	$enseignant = $ens->recuperation($id);
	
	if (isset($_POST['enregistrer'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['mail'];
		$mdp = $_SESSION['nmdp'];
		$update = $ens->modification_ens($id, $nom, $prenom, $email, $mdp);
		if ($update) {
			header('location: enseignant-home');
		}
		else {
			echo "error";
		}
	}
	
  	include '..\Vue\profile-enseignant.php';
?>