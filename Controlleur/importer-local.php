<?php
	require_once '..\partials\login-check.php';
	include '..\Database\connexion.php';
	include '..\Modele\local.php';

	if (isset($_POST['importer'])) {
		//var_dump($_FILES);
		//var_dump($_POST);
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");

		while (($col = fgetcsv($handle, 10000, ";")) !== FALSE) {
			$nom = $col[0];
			$ref = $col[1];
			$cap = $col[2];
			$nbet = $col[3];
			$nben = $col[4];
			$etat = $col[5];

			$loc = new Local();
			$res = $loc->insertion($nom, $ref, $cap, $nbet, $nben, $etat);
			/*try {
				$res = $loc->insertion($nom, $ref, $cap, $nbet, $nben, $etat);
			} catch (Exception $e) {
				echo $e->getMessage();
			}*/
			if ($res) {
				header('location: affiche-local.php');
			}
			else{
				header('location: affiche-local.php');
			}
		}
	}

	include '..\Vue\importer-local.html';
?>