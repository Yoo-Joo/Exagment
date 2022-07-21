<?php 
	require_once '..\partials\login-check.php';
  	include '..\Database\connexion.php';
  	include '..\Modele\enseignant.php';
	include '..\Modele\planification.php';
	include '..\Modele\affectation.php';
	include '..\Modele\demande.php';
	include '..\Modele\local.php';

	$id = $_SESSION['id'];
	$ens = new Enseignant();
	$enseignant = $ens->recuperation($id);

	$pla = new Planification();
    $aff = $pla->recuperation_aff_id($id);

	$af = new Affectation();
	$affectation = $af->recup_date_demi($id);


	$tab = array();
	$dem = new Demande();

	$i = 0;

	foreach( $affectation as $valeur){
		$fdm = $dem->check_dem($valeur->date_aff, $valeur->demi_journee);
		if(sizeof($fdm) > 0){
			foreach($fdm as $vall) {
					$pli = $af->recuperation_remp($vall->id_affectation);
				$tab[$i][0] =  $pli->date_aff;
				$tab[$i][1] =  $pli->demi_journee;
				//$demande = $dem->type_dem($fdm->id_demande);
				$tab[$i][2] = $vall->type_demande;
				$tab[$i][3] = $vall->id_local;
				$tab[$i][4] = $vall->date_demande;
				$tab[$i][6] = $vall->demi_journee_demande;
				$tab[$i][5] = $vall->id_demande;
				$i = $i + 1;
				$n = $i;
				
			}
		}
	}
	$k = 0;
	$tabR = array();
	$demd = $dem->liste_demande();
	foreach ($demd as $key){
		$affectations = $af->check_ens($id, $key->date_demande, $key->demi_journee_demande);
		if(!$affectations and $key->etat_demande == 1 ) {
			$tabR [$k][0] = $key->date_demande;
			$tabR [$k][1] = $key->demi_journee_demande;
			$tabR [$k][2] = $key->type_demande;
			$tabR [$k][3] = $key->id_local;
			$tabR [$k][5] = $key->id_demande;
			$k = $k + 1;
			$m = $k; 	
		}
	}



  	include '..\Vue\enseignant-home.html';
?>