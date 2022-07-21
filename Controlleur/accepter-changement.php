<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';
	include '..\Modele\demande.php';
	include '..\Modele\affectation.php';

	$id = $_GET['id_demande'];

	$dem = new Demande();
	$demande = $dem->recuperation($id);
	$ided = $demande->id_enseignant;
	//echo "demande<br>";
	//var_dump($ided);
	//$temp = $ided;
	$dated = $demande->date_demande;
	//var_dump($dated);
	$demid = $demande->demi_journee_demande;
	//var_dump($demid);
	$idld = $demande->id_local;
	//var_dump($idld);
	$ida = $demande->id_affectation;

	$aff = new Affectation();

	$affectation2 = $aff->recuperation_remp($ida);
	$ide = $affectation2->id_enseignant;
	//var_dump($ided);
	$date = $affectation2->date_aff;
	//var_dump($dated);
	$demi = $affectation2->demi_journee;
	//var_dump($demid);
	$ide = $_SESSION['id'];
	$idl = $aff->check_local($ide, $dated, $demid);
	//var_dump($idld);

	//var_dump($ide);
	//$affectation = $aff->recuperation_remp($ide);
	//$ide = $_SESSION['id'];
	//echo "<br>affectation<br>";
	//var_dump($ide);
	//$date = $affectation->date_aff;
	//var_dump($date);
	//$demi = $affectation->demi_journee;
	//var_dump($demi);
	//$idl = $affectation->id_local;
	//var_dump($idl);
	//var_dump($temp);
	$affectation2 = $aff->changement_update($ide, $idld, $date, $demi);
	$affectation1 = $aff->changement_update($ided, $idl->id_local, $dated, $demid);
   
	if ($affectation1 AND $affectation2) {
		$demm = $dem->modification($id);
		if ($demm) {
			header('location: enseignant-home');
		}
		else {
			echo "error1";
		}
	}
	else {
		echo "error2";
	}
?>