<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\contrainte.php';

	if (isset($_POST['ajouteng'])) {
		$id_en = $_SESSION['id_en'];
		$id_session = $_SESSION['id_session']; 
		$datedm = "";
		$datefm = "";
		$typem = "";
		$typec = 'Autre engagements';
		$dj_eng = $_POST['dj'];
		$dd_miss = ""; 
		$df_miss = "";
		$dest = "";
		$t_resp = "";
		$date_autres_eng = $_POST['dateaue'];

		if ($dj_eng == 'toute-journee') {
			$ctr = new Contrainte();
			$res = $ctr->insertion($id_en, $id_session, $typec, 'Matin', $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: affiche-contrainte.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
			$res = $ctr->insertion($id_en, $id_session, $typec, 'Apres-midi', $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: affiche-contrainte.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
		}else{
			$ctr = new Contrainte();
			$res = $ctr->insertion($id_en, $id_session, $typec, $dj_eng, $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: affiche-contrainte.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
		}
	}
	elseif (isset($_POST['ajoutautre'])) {
		session_start();
		$id_en = $_SESSION['id_en'];
		$id_session = $_SESSION['id_session']; 
		$datedm = "";
		$datefm = "";
		$typem = "";
		$typec = 'Autre engagements'; 
		$dj_eng = $_POST['dj'];
		$dd_miss = ""; 
		$df_miss = "";
		$dest = "";
		$t_resp = "";
		$date_autres_eng = $_POST['dateaue'];

		if ($dj_eng == 'toute-journee') {
			$ctr = new Contrainte();
			$res = $ctr->insertion($id_en, $id_session, $typec, 'Matin', $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: add-autre-engagement.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
			$res = $ctr->insertion($id_en, $id_session, $typec, 'Apres-midi', $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: add-autre-engagement.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
		}else{
			$ctr = new Contrainte();
			$res = $ctr->insertion($id_en, $id_session, $typec, $dj_eng, $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);
			if ($res) {
				header('location: add-autre-engagement.php');
			}
			else{
				//header('location: add-autres-engagements.php');
				echo "error";
			}
		}
	}
	include '..\Vue\autre-engagement.html';
?>