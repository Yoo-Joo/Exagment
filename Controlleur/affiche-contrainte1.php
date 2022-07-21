<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';
    include '..\Modele\contrainte.php';
 
  	$ids = $_GET['id_session'];
  	$_SESSION['actif'] = "<div style='color:#00b300;'><b><i class='fas fa-calendar-check'></i>&nbsp;&nbsp;&nbsp;Actif</b></div>";
  	
  	$ens = new Enseignant();
  	$enseignant = $ens->recuperation_actif();
    $con = new Contrainte();

  	include '..\Vue\manage-contrainte1.php';
?>