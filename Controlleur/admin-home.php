<?php
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\admin.php';
	
	$id = $_SESSION['id'];
	$ad = new Admin();
	$admin = $ad->recuperation($id);

  	include '..\Vue\admin-home.html';
?>