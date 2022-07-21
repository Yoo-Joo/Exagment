<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\planification.php';
	include '..\Modele\filiere.php';
	include '..\Modele\semestre.php';
	include '..\Modele\matiere.php';

	if (isset($_POST['suivant'])) {
		$date = $_POST['datep'];
		$demi = $_POST['demijournee'];
		$filiere = $_POST['filiere'];
		$semestre = $_POST['semestre'];
		$matiere = $_POST['matiere'];
		$id_sess = $_SESSION['id_session'];
		$id_local = $_SESSION['id_local'];

		$fil = new Filiere();
		$sem = new Semestre();
		$mat = new Matiere();

		$pla = new Planification();
		$len = sizeof($id_local);
		for ($i=0; $i<$len ; $i++) {
			$res = $pla->insertion($id_local[$i],$id_sess, $demi, $date, $sem->semestre($semestre), $fil->filiere($filiere), $mat->matiere($matiere));
		}
		
		if ($res) {
			header('location: affiche-contrainte.php');
		}
		else{
			//header('location: ..\Controlleur\affiche-contrainte.php');
			echo "error";
		}
	}

	if (isset($_POST['ajouter'])) {
		$date = $_POST['datep'];
		$demi = $_POST['demijournee'];
		$filiere = $_POST['filiere'];
		$semestre = $_POST['semestre'];
		$matiere = $_POST['matiere'];
		$id_sess = $_SESSION['id_session'];;
		$id_local = $_SESSION['id_local'];;

		$fil = new Filiere();
		$sem = new Semestre();
		$mat = new Matiere();

		$pla = new Planification();
		$len = sizeof($id_local);
		for ($i=0; $i<$len ; $i++) {
			$res = $pla->insertion($id_local[$i],$id_sess, $demi, $date, $sem->semestre($semestre), $fil->filiere($filiere), $mat->matiere($matiere));
		}
		if ($res) {
			header('location: add-planification.php');
		}
		else{
			//header('location: ..\Controlleur\affiche-planning.php');
			echo "error";
		}
	}

	include '..\Vue\add-planification.html';
?>