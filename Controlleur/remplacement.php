<?php
    require_once '..\partials\login-check.php';
    include '..\Database\connexion.php';
    include '..\Modele\planification.php';
    include '..\Modele\local.php';

    $id = $_SESSION['id'];
    $pla = new Planification();
    $aff = $pla->recuperation_aff_id($id);

    include '..\Vue\remplacement.html';
?>