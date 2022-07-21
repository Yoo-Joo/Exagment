<?php
	include_once '..\Database\connexion.php';
	/**
	 *
	 */
	class Local {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($nom, $ref, $capacite, $nbr_et, $nbr_en, $etat) {
			$sql = $this->bdd->prepare("INSERT INTO local (nom_local, ref_local, capacite, nbr_max_et, nbr_max_en, etat_local) VALUES(?, ?, ?, ?, ?, ?);");
			$res = $sql->execute(array($nom, $ref, $capacite, $nbr_et, $nbr_en, $etat));
			return $res;
		}

		public function modification($id, $nom, $ref, $capacite, $nbr_et, $nbr_en, $etat) {
			$sql = $this->bdd->prepare("UPDATE local SET 
										nom_local = ?,
										ref_local = ?,
										capacite = ?,
										nbr_max_et = ?,
										nbr_max_en = ?,
										etat_local = ?
										WHERE id_local = $id;");
			$res = $sql->execute(array($nom, $ref, $capacite, $nbr_et, $nbr_en, $etat));
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM local WHERE id_local = '$id'");
			return $res;
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM local WHERE id_local = $id;");
				$obj = $res->fetch(PDO::FETCH_ASSOC);
				return $obj;
			}
			else{
				$tabobj = array();
				$res = $this->bdd->query("SELECT * FROM local");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

		public function recuperation_actif() {
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM local WHERE etat_local = 'Actif'");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function affectation($ide, $ids) {
			//litse des enseignants affecter au local id
			$sql = $this->bdd->prepare("SELECT id_local FROM affectation a, session s
										WHERE id_enseignant = $ide AND id_session = $ids;");
			//$res = $sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			return $tab;
		}

		public function recuperation_aff() {
			$count = 0;
			while ($count == 0) {
				$nbr = rand(1,2000);
				$sql = $this->bdd->prepare("SELECT id_local FROM local WHERE id_local = '$nbr' and etat_local = 'Actif'");
				$sql->execute();
				$count = $sql->rowCount();
				//$res = $sql->execute();
				$tab = $sql->fetch(PDO::FETCH_ASSOC);
			}
			return $tab;
		}

		public function nbr_max($id) {
			$res = $this->bdd->query("SELECT nbr_max_en FROM local WHERE id_local = $id;");
			$obj = $res->fetch(PDO::FETCH_NUM);
			$nbr = $obj[0];
			return (int)$nbr;
		}

		public function nom_local($id) {
			$res = $this->bdd->query("SELECT nom_local, ref_local FROM local WHERE id_local = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}
	}
?>