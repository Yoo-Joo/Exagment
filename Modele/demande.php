<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Demande {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($iden, $idloc, $idaf, $type, $date, $demi) {
			$sql = $this->bdd->prepare("INSERT INTO demande (id_enseignant, id_local, id_affectation, type_demande, date_demande, demi_journee_demande, etat_demande) VALUES(?, ?, ?, ?, ?, ?, 1);");
			$res = $sql->execute(array($iden, $idloc, $idaf, $type, $date, $demi));
			return $res;
		}

		public function modification($id) {
			$sql = $this->bdd->prepare("UPDATE demande SET 
										etat_demande = 0
										WHERE id_demande = $id;");
			$res = $sql->execute();
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM contrainte WHERE id_contrainte = $id;");
			return $res;
		}

		public function recuperation($id) {
			$res = $this->bdd->query("SELECT * FROM demande WHERE id_demande = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function check_ens($ids, $ide) {
			$res = $this->bdd->query("SELECT COUNT(*) FROM contrainte WHERE id_session = $ids AND id_enseignant = $ide;");
			//$obj = $res->fetch(PDO::FETCH_OBJ);
			$count = $res->fetchColumn();
			if ($count > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function type_con($ide, $ids) {
			$res = $this->bdd->query("SELECT type_contrainte FROM contrainte WHERE id_session = $ids AND id_enseignant = $ide;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}



		public function check_dem($date, $dj) {
			//$res = $this->bdd->query("SELECT id_demande, id_local, type_demande FROM demande ");
			//$obj = $res->fetch(PDO::FETCH_OBJ);
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM demande WHERE date_demande = '$date' AND demi_journee_demande = '$dj' AND etat_demande = 1 limit 1;"); 
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function type_dem($id) {
			$res = $this->bdd->query("SELECT type_demande, id_local FROM contrainte WHERE id_session = $ids AND id_enseignant = $ide;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function liste_demande() {
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM demande WHERE type_demande = 'Remplacement' ;"); 
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}
	}
?>