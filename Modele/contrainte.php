<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Contrainte {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($id_en, $id_session, $t_con, $dj_eng, $dd_mal, $df_mal, $t_mal, $t_respo, $dd_miss, $df_miss, $dest, $d_ae) {
			$sql = $this->bdd->prepare("INSERT INTO contrainte (id_enseignant, id_session, type_contrainte,  demi_journee_eng, date_debut_mal, date_fin_mal, type_maladie, type_responsabilite, date_debut_miss, date_fin_miss, destination, date_autres_eng) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
			$res = $sql->execute(array($id_en, $id_session, $t_con, $dj_eng, $dd_mal, $df_mal, $t_mal, $t_respo, $dd_miss, $df_miss, $dest, $d_ae));
			return $res;
		}

		public function modification($t_con, $dj_eng, $dd_mal, $df_mal, $t_mal, $dd_miss, $df_miss, $dest, $t_resp) {
			$sql = $this->bdd->prepare("UPDATE contrainte SET 
										type_contrainte = ?,

										demi_journee_eng = ?,

										date_debut_mal = ?,
										date_fin_mal = ?,
										type_maladie = ?,

										date_debut_miss = ?,
										date_fin_miss = ?,
										destination = ?,

										type_responsabilite = ?,

										WHERE id_contrainte = $id;");
			$res = $sql->execute(array($t_con, $dj_eng, $dd_mal, $df_mal, $t_mal, $dd_miss, $df_miss, $dest, $t_resp));
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM contrainte WHERE id_contrainte = $id;");
			return $res;
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM contrainte WHERE id_contrainte = $id;");
				$obj = $res->fetch(PDO::FETCH_OBJ);
				return $obj;
			}
			else{
				$tabobj =array();
				$res = $this->bdd->query("SELECT * FROM contrainte");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
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
	}
?>