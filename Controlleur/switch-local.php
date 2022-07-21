<?php
    require_once '..\partials\login-check.php';
    include '..\Database\connexion.php';
    include '..\Modele\local.php';

    $loc = new Local();
    $locaux = $loc->recuperation_actif();

    if (isset($_POST['terminer'])) {
        $id = $_POST['localact'];
        //var_dump($id);
        $_SESSION['id_local'] = $id;
        header('location: add-planification.php');
    }

    include '..\Vue\switch-local.html';
?>