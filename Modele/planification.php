<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Planification {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($id, $id_session, $demi_jour_pla, $date_pla, $semestre, $filiere, $matiere) {
			$sql = $this->bdd->prepare("INSERT INTO planification (id_local, id_session, demi_journee_pla, date_pla, semestre, filiere, matiere) VALUES(?, ?, ?, ?, ?, ?, ?);");
			$res = $sql->execute(array($id, $id_session, $demi_jour_pla, $date_pla, $semestre, $filiere, $matiere));
			return $res;
		}

		public function modification($id, $demi_jour_pla, $date_pla, $semestre, $filiere, $matiere) {
			$sql = $this->bdd->prepare("UPDATE planification SET 
										demi_journee_pla = ?,
										date_pla = ?,
										semestre = ?,
										filiere = ?,
										matiere = ?
										WHERE id_planification = $id;");
			$res = $sql->execute(array($id, $id_session, $demi_jour_pla, $date_pla, $semestre, $filiere, $matiere));
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM planification WHERE id_planification = $id;");
			return $res;
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM planification WHERE id_planification = $id;");
				$obj = $res->fetch(PDO::FETCH_OBJ);
				return $obj;
			}
			else{
				$tabobj = array();				
				$res = $this->bdd->query("SELECT * FROM planification");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

		public function recuperation_aff_dt($id) {
			$sql = $this->bdd->prepare("SELECT date_pla FROM planification WHERE id_planification = '$id'");
			$sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			$date_pla = $tab[0];
			return $date_pla;
		}

		public function recuperation_aff_dj($id) {
			$sql = $this->bdd->prepare("SELECT demi_journee_pla FROM planification WHERE id_planification = '$id'");
			$sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			$demi_pla = $tab[0];
			return $demi_pla;
		}

		public function insertion_aff($ens, $loc, $ids, $plan_dt, $plan_dj) {
			$sql = $this->bdd->prepare("INSERT INTO affectation (id_enseignant, id_local, id_session, date_aff, demi_journee) VALUE(?, ?, ?, ?, ?)" ) ;
			$res = $sql->execute(array($ens, $loc, $ids, $plan_dt, $plan_dj));
			return $res;
		}

		public function recuperation_pla($id) {
			$sql = $this->bdd->prepare("SELECT id_planification FROM planification WHERE id_session = '$id' order by RAND() LIMIT 1");
			$sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			$pla = $tab[0];
			return (int)$tab;
		}
		
		public function count_pla($id) {
				$res = $this->bdd->query("SELECT DISTINCT COUNT(id_planification) FROM planification WHERE id_session = $id;");
				$obj = $res->fetch(PDO::FETCH_NUM);
				$nbr = $obj[0];
				return (int)$nbr;
		}

		public function local_id($id) {
			$res = $this->bdd->query("SELECT id_local FROM planification WHERE id_planification = $id;");
			$obj = $res->fetch(PDO::FETCH_NUM);
			$nbr = $obj[0];
			return (int)$nbr;
		}

		public function recuperation_pla_id($id) {
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM planification WHERE id_session = $id;");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function recuperation_aff_id($id) {
			$tabobj = array();				
			$res = $this->bdd->query("SELECT id_affectation, date_aff, demi_journee, id_local FROM affectation WHERE id_enseignant = $id");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}
	}
?>