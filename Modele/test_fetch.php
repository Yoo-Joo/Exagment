<?php 
	include '..\Database\connexion.php';
	include 'enseignant.php';
	include 'admin.php';
	include 'local.php';
	include 'session.php';
	include 'planification.php';
	include 'contrainte.php';
	include 'affectation.php';

	/*$tab = new Session();
	$sa = $tab->recuperation_actif();*/
	//print_r($sa);
	/*session_start();
	$id = $_GET['id_session'];
	var_dump($id);*/
	/*$id = 41;
	$pla = new Planification();
  	$planification = $pla->recuperation_pla_id($id);
	foreach ($planification as $value) {
		echo $value->semestre;
	}*/

	/*$res = $this->bdd->query("SELECT id_session FROM session ORDER BY id_session desc LIMIT 1;");
	$obj = $res->fetch(PDO::FETCH_OBJ);
	var_dump($obj);
	$loc = new Contrainte();
	$local = $loc->type_con(10, 41);
	var_dump($local)*/


	/*$en = new Enseignant();
	$ens = $en->recuperation_aff();
	print_r($ens);

	$lo = new Local();
	$loc = $lo->recuperation_aff();
	print_r($loc);

	$pla = new Planification();
	$plan_dt = $pla->recuperation_aff_dt($id);
	print_r($plan_dt);

	$plan_dj = $pla->recuperation_aff_dj($id, $plan_dt);
	print_r($plan_dj);

	$pla = new Planification();
	$aff = $pla->insertion_aff($ens['id_enseignant'], $loc['id_local'], $plan_dt[0], $plan_dj[0]);
    if ($aff) {
        echo "done";
    }
    else {
        echo "not yet";
    }*/

	/*session_start();
	$id = $_SESSION['id'];
	var_dump($id);
  	$ad = new Admin();
  	$admin = $ad->recuperation($id);
	var_dump($admin["prenom_admin"]);*/
	
	/*foreach ($sa as $value) {
		echo $value->nom_local;
		echo " ";
		echo $value->ref_local;
		echo "<br>";
	}*/
	
	/*if ($sa) {
		echo "insert is done";
	}
	else{
		echo "Failed to insert data";
	}*/

	/*$string = '4';
	var_dump($string);
	$int = intval($string);
	var_dump($int);*/
	/*echo "<b>Enseignant</b><br>";
	$ens = new Enseignant();
    $enseignant = $ens->recuperation_actif();
    $tabef = array();
	$tabee = array();*/
	/*$i = 0;
	foreach ($enseignant as $value) {
		$tabef[] = (int)$value->id_enseignant;
		echo $tabef[$i];
		$i = $i +1;
		echo "<br>";
	}
	echo "<br>size of table<br>";
	$len = count($tabef);
	echo $len;
	echo "<br>random number<br>";
	$r = rand(0, count($tabef));
	echo $r;
	echo "<br>second array<br>";
	$tabee[0] = $tabef[$r];
	echo $tabee[0];
	unset($tabef[$r]);*/

	////////////////////////////////// Partie I : //////////////////////////////////

	//id session
	/*$ids = 68;

	//Les id des planifications dans cette session
	$pla = new Planification();
	$planification = $pla->recuperation_pla_id($ids);

	//Les id des enseignants actif
	$ens = new Enseignant();
	$enseignant = $ens->recuperation_actif();

	//Les tableau plein d'enseignant et de planification
	$tabpf = array();
	$tabef = array();

	//Le tableau vide d'enseignant
	$tabee = array();
	
	//L'insertion des planifications
	foreach ($planification as $value) {
		$tabpf[] = (int)$value->id_planification;
	}

	//L'insertion des enseignants
	foreach ($enseignant as $valeur) {
		$tabef[] = (int)$valeur->id_enseignant;
	}

	//Initialiser le tableau avec des 0
	for ($k=0; $k <count($tabef) ; $k++) { 
		$tabee[$k] = 0;
	}


	////////////////////////////////// Partie II : /////////////////////////////////

	//Boucle for pour les planifications
	for ($i=0; $i < count($tabpf) and !empty($tabef); $i++) { 

		//id de planification
		$idp = $tabpf[$i];

		//La date de cette planification
		$date = $pla->recuperation_aff_dt($idp); 

		//La demi-journée de cette planification
		$demi = $pla->recuperation_aff_dj($idp);

		//id local de cette planification
		$local = $pla->local_id($idp);
		$loc = new Local();

		//Le nombre maximum des ensiegnant sur ce local
		$nbr_max = $loc->nbr_max($local); 

		//Boucle for pour les enseignants
		for ($j=0; $j < $nbr_max and !empty($tabef); $j++) { 

			//Prendre aléatoirement un indice de tableau d'enseignant qu'il va être affecté à une planification 
			$r = rand(0, count($tabef)-1);
			echo "tab ef : ";
			var_dump($tabef);
			echo "<br>tab ee : ";
			var_dump(count($tabee));
			echo "<br>".$r."<br>";
			//Chèquer si l'enseignant est dans la table vide d'enseignant
			if (!in_array($tabef[$r], $tabee)) {

				//Appelle de fonction qui chéquer si l'enseignant à une contrainte ou non
				$con = new Contrainte();
				$contrainte = $con->check_ens($ids, $tabef[$r]); //erreur
				if(!$contrainte){

					//Si ne pas le cas on vas inseré l'affectation dans la base de donnée
					$aff = $pla->insertion_aff($tabef[$r], $local, $date, $demi);
					if ($aff) {
						echo "insert is done<br>";
					}else {
						echo "failed to insert";
					}

					//Stocker et Supprimer l'id d'enseignant qu'on à déjà inseré pour ne l'inseré pas une autres fois jusqu'à ce que la boucle retourne
					$tabee[$j] = $tabef[$r];
					unset($tabef[$r]);
					$tabef = array_values($tabef);
				}else {
					unset($tabef[$r]);
					$j = $j - 1;
				}
			}else {
				$j = $j - 1;
			}
		}
	}*/

	/*$ens = new Affectation();
    $enseignant = $ens->replace_demande('2021-07-01', 'Matin');
	var_dump($enseignant);*/
	//foreach($enseignant as $value){
	//	echo $value->nom_enseignant." ".$value->prenom_enseignant;
	//}




	/*echo "<br><br><b>Planification</b><br>";
	//stocking planning
	$pla = new Planification();
    $planification = $pla->recuperation();
    $tabpf = array(); //full planning array
	$tabpe = array(); //empty planning array
	$i = 0;
	foreach ($planification as $value) {
		$tabpf[] = (int)$value->id_planification; //store data to array
		echo $tabpf[$i];
		$i = $i +1;
		echo "<br>";
	}
	for ($k=0; $k <count($tabpf) ; $k++) { 
	$idp = $tabpf[$k];
	$date = $pla->recuperation_aff_dt($idp); //getting the day from database
	$demi = $pla->recuperation_aff_dj($idp); //getting the half day from database
	$local = $pla->local_id($idp); //getting the id local from database
	$loc = new Local();
	$nbr_max = $loc->nbr_max($local); //getting the maximum number of teachers
	echo $nbr_max;
	echo "<br>Les id des enseignants<br>";
	foreach ($enseignant as $value) {
		$tabef[] = (int)$value->id_enseignant; 
	}
	$len = count($tabef);
	for ($j=0; $j < $nbr_max; $j++) { 
		$r = rand(0, count($tabef)-1);
		if (!in_array($tabef[$r], $tabee)) {
		echo $tabef[$r]."<br>";
		$con = new contrainte();
		$contrainte = $con->check_ens($tabef[$j], 68);
		if (!$contrainte) {
			$tabee[$j] = $tabef[$r];
			unset($tabef[$r]);
			$aff = $pla->insertion_aff($tabee[$j], $local, $date, $demi);
			if ($aff) {
				echo "Contrainte";
			}else {
				echo "Non contrainte";
			}
		}else {
			$j = $j - 1;
		}
		}
		else {
			$j = $j - 1;
		}
	}
	}*/
	$aff = new Affectation();
	$affectation1 = $aff->modification_aff_dem(22, '2021-07-13', 'Aprés-midi', 25);
    //$affectation2 = $aff->modification_aff_dem(14, '2021-07-15', 'Matin', 31, 22);
	if ($affectation1) {
		echo "ok";
	}










	/*$j = 0;
	for ($j=0; $j < $len; $j++) {
		echo $tabef[$j];
		echo "<br>";
	}*/






	/*echo "<b>Planification</br><br>";
	$pla = new Planification();
	$planification = $pla->recuperation();
	$tabpf = array();
		foreach ($planification as $valeur) {
			$tabpf = array( (int)$valeur->id_planification, );
			echo $tabpf[0];
			echo "<br>";
		}*/
		
    
	//var_dump($tabf[5]);

	/*echo "<br>";
	$r = rand(0, $i);
	$j = 0;*/
	//unset($tabf[$r]);
	//for ($j=0; $j < $i; $j++) { 
		//while ($j < 5) {
			//var_dump($tabf[10]);
			//$j = $j+1;
		//} 
	//}
?>