<?php
    require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';

    if (isset($_POST['enregistrer'])) {
        $amdp = $_POST['amdp'];
        $nmdp = $_POST['nmdp'];
        $cmdp = $_POST['cmdp'];
        $id = $_SESSION['id'];

        $ens = new Enseignant();
        $enseignant = $ens->recuperation($id);
        $mdp = $enseignant['mdp_enseignant'];
        if ($mdp == $amdp) {
            if ($nmdp == $cmdp) {
                $_SESSION['nmdp'] = $nmdp;
                header('location: profile-aff-enseignant.php');
            }
        }
        else {
            echo 'error';
        }
    }


  	include '..\Vue\update-password-e.html';

?>