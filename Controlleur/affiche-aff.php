<?php 
    require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\affectation.php';
    include '..\Modele\enseignant.php';
    include '..\Modele\local.php';

  	$aff = new Affectation();
  	$affectation = $aff->recuperation();
  	include '..\Vue\manage-aff.php';
?>