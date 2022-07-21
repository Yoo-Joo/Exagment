<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Affectation {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM admin WHERE id_admin = $id;");
				$obj = $res->fetch(PDO::FETCH_ASSOC);
				return $obj;
			}
			else{
				$tabobj = array();
				$res = $this->bdd->query("SELECT * FROM affectation");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

        public function modification($idb, $ida, $id) {
			$sql = $this->bdd->prepare("UPDATE affectation SET 
										id_enseignant = ?
										WHERE id_enseignant = $idb
										AND id_affectation = $id");
			$res = $sql->execute(array($ida));
			return $res;
		}

		public function modificationn($id, $ida) {
			$sql = $this->bdd->prepare("UPDATE affectation SET 
										id_enseignant = ?
										WHERE id_affectation = $id");
			$res = $sql->execute(array($ida));
			return $res;
		}

		public function recuperation_id($date, $dj, $loc) {
			$res = $this->bdd->query("SELECT id_affectation FROM affectation WHERE date_aff = '$date' AND demi_journee = '$dj' AND id_local = $loc;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function recuperation_loc_aff($id) {
			$res = $this->bdd->query("SELECT * FROM affectation WHERE id_affectation = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function recup_date_demi($id) {
			$tabobj = array();
			$res = $this->bdd->query("SELECT date_aff, demi_journee FROM affectation WHERE id_enseignant = $id");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function replace_demande($date, $dj) {
			$tabobj = array();
			$res = $this->bdd->query("SELECT id_enseignant FROM affectation WHERE date_aff != '$date' OR demi_journee != '$dj'");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function check_ens($id, $date, $dj) {
			$res = $this->bdd->query("SELECT COUNT(*) FROM affectation WHERE id_enseignant = $id AND date_aff = '$date' AND demi_journee = '$dj';");
			//$obj = $res->fetch(PDO::FETCH_OBJ);
			$count = $res->fetchColumn();
			if ($count > 0) {
				return true;
			} 
		}

		public function recuperation_remp($id) {
			$res = $this->bdd->query("SELECT date_aff, demi_journee, id_local, id_enseignant FROM affectation WHERE id_affectation = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function modification_id_ens($ide, $date, $demi, $idl, $ida) {
			$sql = $this->bdd->prepare("UPDATE affectation SET 
										id_enseignant = ?
										WHERE date_aff = '$date'
										AND demi_journee = '$demi'
										AND id_local = $idl
										AND id_affectation = $ida");
			$res = $sql->execute(array($ide));
			return $res;
		}

		public function modification_aff_dem($ide, $date, $demi, $idl, $id) {
			$sql = $this->bdd->prepare("UPDATE affectation SET 
										id_enseignant = ?
										WHERE date_aff = '$date'
										AND demi_journee = '$demi'
										AND id_local = $idl
										AND id_enseignant = $id");
			$res = $sql->execute(array($ide));
			return $res;
		}

		public function changement_update($id, $idl, $date, $dj) {
			$sql = $this->bdd->prepare("UPDATE affectation SET 
										id_local = ?,
										date_aff = ?,
										demi_journee = ?
										WHERE id_enseignant = $id;");
			$res = $sql->execute(array($idl, $date, $dj));
			return $res;
		}

		public function check_local($id, $date, $dj) {
			$res = $this->bdd->query("SELECT id_local FROM affectation WHERE id_enseignant = $id AND date_aff = '$date' AND demi_journee = '$dj';");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}
	}
?>