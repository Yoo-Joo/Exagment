<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\session.php';

	if (isset($_POST['importer'])) {
		//var_dump($_FILES);
		//var_dump($_POST);
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");

		while (($col = fgetcsv($handle, 10000, ";")) !== FALSE) {
			$debut = $col[0];
			$fin = $col[1];
			$nom = $col[2];
			$type = $col[3];
			$annee = $col[4];
			$etat = $col[5];
			$id = $col[6];

			$ses = new Session();
			$res = $ses->insertion($debut, $fin, $nom, $type, $annee, $etat, $id);
			/*try {
				$res = $loc->insertion($nom, $ref, $cap, $nbet, $nben, $etat);
			} catch (Exception $e) {
				echo $e->getMessage();
			}*/
			if ($res) {
				header('location: affiche-planning.php');
			}
			else{
				header('location: affiche-planning.php');
			}
		}
	}

	include '..\Vue\importer-session.html';
?>