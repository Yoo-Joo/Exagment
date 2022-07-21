<?php
    require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\admin.php';

    if (isset($_POST['enregistrer'])) {
        $amdp = $_POST['amdp'];
        $nmdp = $_POST['nmdp'];
        $cmdp = $_POST['cmdp'];
        $id = $_SESSION['id'];

        $ad = new Admin();
        $admin = $ad->recuperation($id);
        $mdp = $admin['mdp_admin'];
        if ($mdp == $amdp) {
            if ($nmdp == $cmdp) {
                $_SESSION['nmdp'] = $nmdp;
                header('location: profile-aff-admin.php');
            }
        }
        else {
            echo 'error';
        }
    }


  	include '..\Vue\update-password.html';

?>