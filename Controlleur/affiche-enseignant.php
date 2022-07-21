<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';

  	$_SESSION['actif'] = "<div style='color:#00b300;'><b><i class='fas fa-calendar-check'></i>&nbsp;&nbsp;&nbsp;Actif</b></div>";
  	$_SESSION['non actif'] = "<div style='color:#ff1919;'><b><i class='fas fa-calendar-times'></i>&nbsp;&nbsp;&nbsp;Non actif</b></div>";

  	$ens = new Enseignant();
  	$enseignant = $ens->recuperation();
  	include '..\Vue\manage-enseignant.php';
?>