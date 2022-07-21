<?php
    require_once '..\partials\login-check.php';
    include '..\Database\connexion.php';
    include '..\Modele\affectation.php';
    include '..\Modele\enseignant.php';

    $_SESSION['id_aff'] = $_GET['id_affectation'];

    $ens = new Enseignant();
    $enseignant = $ens->recuperation_list();

    

    //$ide = $en->id_enseignant;
    
    /*$nome = $ens->nom_ens($ide);

    $nom = $nome->nom_enseignant;
    $prenom = $nome->prenom_enseignant;*/

    
    //$idens = $enseignant->id_enseignant;

    

    

    include '..\Vue\list-enseignant.html';
?>