<?php
    require_once '..\partials\login-check.php';
    include '..\Database\connexion.php';
    include '..\Modele\planification.php';
    include '..\Modele\demande.php';
    include '..\Modele\affectation.php';

    $id = $_SESSION['id'];
    $pla = new Planification();
    /*$aff = $pla->recuperation_aff_id($id);
    $idl = $aff->id_local;*/

    if (isset($_POST['demande'])) {
        $ida = $_POST['before'];
        $datec = $_POST['datec'];
        $demic = $_POST['demijourneec'];
        $type = 'Changement';

        $aff = new Affectation();
        $affectation = $aff->recuperation_loc_aff($ida);
        $idl = $affectation->id_local;

        /*$affectation = $aff->recuperation_id($date, $demi, $idl);
        $ida = $affectation->id_affectation;*/


        $dem = new Demande();
        $demande = $dem->insertion($id, $idl, $ida, $type, $datec, $demic);
        if ($demande) {
            header('location: changement');
        }else {
            echo "error";
        }
    }

    include '..\Vue\changement.html';
?>