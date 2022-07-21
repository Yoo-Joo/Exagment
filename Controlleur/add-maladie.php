<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\contrainte.php';
	
	if (isset($_POST['ajoutmal'])) {
		$id_en = $_SESSION['id_en'];
		$id_session = $_SESSION['id_session']; 
		$datedm = $_POST['datedm'];
		$datefm = $_POST['datefm'];
		$typem = $_POST['typem'];
		$typec = 'Maladie'; 
		$dj_eng = "";
		$dd_miss = "";
		$df_miss = "";
		$dest = "";
		$t_resp = "";
		$date_autres_eng = "";

		$ctr = new Contrainte();
		$res = $ctr->insertion($id_en, $id_session, $typec, $dj_eng, $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
		if ($res) {
			header('location: affiche-contrainte.php');
		}
		else{
			//header('location: affiche-contrainte.php');
			echo "error";
		}
	}
	include '..\Vue\maladie.html';
?>