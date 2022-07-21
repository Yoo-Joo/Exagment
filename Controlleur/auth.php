<?php
    include '..\Database\connexion.php';
    include '..\Modele\admin.php';
    include '..\Modele\enseignant.php';
    session_start();

    if(isset($_POST['connecter'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $ad = new Admin();
        $admin = array();
        $admin = $ad->recuperation_email($email);
        //$count = Count($admin);
        //var_dump($count);
        $en = new Enseignant();
        $enseignant = array();
        $enseignant = $en->recuperation_email($email);

        if($admin){
            if ($pass == $admin['mdp_admin']) {
                session_start();
                $_SESSION['id'] = $admin['id_admin'];
                $_SESSION['email'] = $admin['email_admin'];
                $_SESSION['mdp'] = $admin['mdp_admin'];
                header('location: admin-home.php');
            }
            else {
                $_SESSION['wrong-pass'] = "<div style='color: red;'>Mot de passe incorrect !</div>";
                //echo "admin mdp incorrect";
            }
        }else if($enseignant){
            if ($pass == $enseignant['mdp_enseignant']) {
                session_start();
                $_SESSION['id'] = $enseignant['id_enseignant'];
                $_SESSION['email'] = $enseignant['adresse_mail'];
                $_SESSION['mdp'] = $enseignant['mdp_admin'];
                header('location: enseignant-home');
            }
            else {
                $_SESSION['wrong-pass'] = "<div style='color: red;'>Mot de passe incorrect !</div>";
                //echo "enseignant mdp incorrect";
            }
        }
        else {
            $_SESSION['email-mdp'] = "<div style='text-align: center; color: red;'></div>";
            //echo "Email ou mot de passe incorrect!";
        }
    }

    include '..\Vue\auth-vue.php';
?>