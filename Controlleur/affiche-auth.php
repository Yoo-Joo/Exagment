<?php 
    require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\admin.php';
    include '..\Modele\enseignant.php';

    $ad = new admin();
    $admin = $ad->recuperation_email($email);
    $en = new enseignant();
    $enseignant = $en->recuperation_email($email);

  	include '..\Vue\auth.html';
?>