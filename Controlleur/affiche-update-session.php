<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\session.php';

    $id = $_GET['id_session'];
  	$ses = new Session();
  	$session = $ses->recuperation($id);
  	include '..\Vue\update-session.php';
?>