<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';
    include '..\Modele\demande.php';
    include '..\Modele\affectation.php';

    $ide = $_SESSION['id'];
	$id = $_GET['id_demande'];

    $dem = new Demande();
    $demande = $dem->recuperation($id);
    $date = $demande->date_demande;
    $demi = $demande->demi_journee_demande;
    $idl = $demande->id_local;
    $ida = $demande->id_affectation;

    $aff = new Affectation();
    $affectation = $aff->modification_id_ens($ide, $date, $demi, $idl, $ida);
    if ($affectation) {
        $demm = $dem->modification($id);
        if ($demm) {
            header('location: enseignant-home');
            //echo "khdamt";
        }
        else {
            echo "error2";
        }
    }
    else {
        echo "error1";
    }
?>