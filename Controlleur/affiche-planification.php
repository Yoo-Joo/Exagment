<?php
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\planification.php';
 
  	$id = $_GET['id_session'];
	$_SESSION['id_session'] = $id;
  	$_SESSION['actif'] = "<div style='color:#00b300;'><b><i class='fas fa-calendar-check'></i>&nbsp;&nbsp;&nbsp;Actif</b></div>";
  	
  	$pla = new Planification();
  	$planification = $pla->recuperation_pla_id($id);

  	include '..\Vue\manage-planification.php';
?>