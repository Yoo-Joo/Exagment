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

        $af = new Affectation();
        $affectation = $af->recuperation_loc_aff($ida);
        $idl = $affectation->id_local;
        var_dump($idl);
        $date = $affectation->date_aff;
        $demi = $affectation->demi_journee;
        $type = 'Remplacement';

        /*$aff = new Affectation();
        $affectation = $aff->recuperation_loc_aff($id, $date, $demi);
        $idl = $affectation->id_local;
        $ida = $affectation->id_affectation;*/

        /*$affectation = $aff->recuperation_id($date, $demi, $idl);
        $ida = $affectation->id_affectation;*/


        $dem = new Demande();
        $demande = $dem->insertion($id, $idl, $ida, $type, $date, $demi);
        if ($demande) {
            header('location: remplacement');
        }else {
            echo "error";
        }
    }

    include '..\Vue\remplacement.html';
?>