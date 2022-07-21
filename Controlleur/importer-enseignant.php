<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\enseignant.php';

	if (isset($_POST['importer'])) {
		//var_dump($_FILES);
		//var_dump($_POST);
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");

		while (($col = fgetcsv($handle, 10000, ";")) !== FALSE) {
			$nom = $col[0];
			$prenom = $col[1];
			$mdp = $col[2];
			$mail = $col[3];
			$dept = $col[4];
			$crd = $col[5];
			$etat = $col[6];

			$ens = new Enseignant();
			$res = $ens->insertion($nom, $prenom, $mail, $dept, $mdp, $crd, $etat);
			/*try {
				$res = $loc->insertion($nom, $ref, $cap, $nbet, $nben, $etat);
			} catch (Exception $e) {
				echo $e->getMessage();
			}*/
			if ($res) {
				header('location: affiche-enseignant.php');
			}
			else{
				header('location: affiche-enseignant.php');
			}
		}
	}

	include '..\Vue\importer-enseignant.html';
?>