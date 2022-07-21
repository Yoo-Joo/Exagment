<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\enseignant.php';
    include '..\Modele\local.php';
    include '..\Modele\planification.php';
    include '..\Modele\session.php';
    include '..\Modele\contrainte.php';

    ////////////////////////////////// Partie I : //////////////////////////////////

	//id session
	$ids = $_GET['id_session'];

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


	////////////////////////////////// Partie II : //////////////////////////////////

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
		for ($j=0; $j < $nbr_max and !empty($tabef) ; $j++) { 

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
					$aff = $pla->insertion_aff($tabef[$r], $local, $ids, $date, $demi);
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
	}
	header('location: affiche-gen');
?>