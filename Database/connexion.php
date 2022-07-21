<?php
	function connexion(){
		try{
			$pdo = new PDO("mysql:host=localhost; dbname=gestion-surveillances", "root", "");
			//echo "connexion avec succés";
			return $pdo;

		} catch (Exception $e){
			//echo "Problème de connexion".$e->getMessage();
			return $e;
		}
	}
?>
