<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\contrainte.php';
	
	$id_en = $_GET['id_enseignant'];
	$_SESSION['id_en'] = $id_en;

	if (isset($_POST['ajouterctr'])) {		
		//var_dump($id_en);
		//$id_session = $_SESSION['id_session'];
		$typec = $_POST['ctrn'];
				
		/*$ctr = new Contrainte();
		$res = $ctr->insertion($id_en, $id_session, $typec, $dj_eng, $datedm, $datefm, $typem, $t_resp, $dd_miss, $df_miss, $dest, $date_autres_eng);*/
		if($typec == "Maladie"){
			header('location: add-maladie.php');
			//echo($_SESSION['id_esession']);
		}
		elseif ($typec=='Responsabilite') {
			header('location: add-respo.php');
		}
		elseif ($typec=='Mission') {
			header('location: add-mission.php');
		}
		elseif ($typec=='Autre engagements') {
			header('location: add-autre-engagement.php');
		}
		else{
			header('location: add-contrainte.php');
		}
	}	
							
	include '..\Vue\add-contrainte.html';
?>