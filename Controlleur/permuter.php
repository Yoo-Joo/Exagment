<?php
    require_once '..\partials\login-check.php';
    include '..\Database\connexion.php';
    include '..\Modele\affectation.php';
    include '..\Modele\enseignant.php';

    $ens = new Enseignant();
    //$enseignant = $ens->recuperation_list();
    

    if (isset($_POST['permuter'])) {
        $ida1 = $_POST['before'];
        $ida2 = $_POST['after'];

        $enseignant1 = $ens->id_ens($ida1);
        $ens1 = $enseignant1->id_enseignant;
        $temp = $ens1;

        $enseignant2 = $ens->id_ens($ida2);
        $ens2 = $enseignant2->id_enseignant;

        $aff = new Affectation();
        //$affecation = $aff->modificationn($ideb, $idea, $id);
        /*$idea = $_POST['id'];
        $id = $_SESSION['id_aff'];
        $ense = $ens->id_ens($id);
        $ideb = $ense->id_enseignant;
        $aff = new Affectation();
        var_dump($ideb);
        var_dump($idea);*/
        $affectation1 = $aff->modificationn($ida1, $ens2);
        $affectation2 = $aff->modificationn($ida2, $temp);
        if ($affectation1 AND $affectation2) {
            header('location: affiche-aff');
            //echo "laa";
        }else {
            echo "error";
        }
    }
?>





