<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';
 
  	
  	$_SESSION['actif'] = "<div style='color:#00b300;'><b><i class='fas fa-calendar-check'></i>&nbsp;&nbsp;&nbsp;Actif</b></div>";
  	
  	$ens = new Enseignant();
  	$enseignant = $ens->recuperation_actif();

  	include '..\Vue\manage-contrainte.php';
?>