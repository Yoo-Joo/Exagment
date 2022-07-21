<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Session {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($date_debut, $date_fin, $nom_session, $type_session, $annee_universitaire, $etat, $id_admin) {
			$sql = $this->bdd->prepare("INSERT INTO session (date_debut, date_fin, nom_session, type_session, annee_universitaire, etat_session, id_admin) VALUES(?, ?, ?, ?, ?, ?, ?);");
			$res = $sql->execute(array($date_debut, $date_fin, $nom_session, $type_session, $annee_universitaire, $etat, $id_admin));
			return $res;
		}

		public function modification($id, $date_debut, $date_fin, $nom_session, $type_session, $annee_universitaire, $etat, $id_admin) {
			$sql = $this->bdd->prepare("UPDATE session SET 
										date_debut = ?,
										date_fin = ?,
										nom_session = ?,
										type_session = ?,
										annee_universitaire = ?,
										etat_session = ?,
										id_admin = ?
										WHERE id_session = $id;");
			$res = $sql->execute(array($date_debut, $date_fin, $nom_session, $type_session, $annee_universitaire, $etat, $id_admin));
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM session  WHERE id_session = $id;");
			return $res;
		}

		public function recuperation($id = null) {
			if($id != null){
				$res = $this->bdd->query("SELECT * FROM session WHERE id_session = $id;");
				$obj = $res->fetch(PDO::FETCH_OBJ);
				return $obj;
			}
			else{
				$tabobj = array();
				$res = $this->bdd->query("SELECT * FROM session");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

		public function recuperer_idsession(){
			$res=$this->bdd->query("select id_session from session order by  id_session desc LIMIT 1 ");
			return $res->fetch()["id_session"];
		}


		public function recuperation_aff() {
			$count = 0;
			while ($count == 0) {
				$nbr = rand(1,2000);
				$sql = $this->bdd->prepare("SELECT id_session FROM session WHERE id_session = '$nbr' and etat_session = 'Actif'");
				$sql->execute();
				$count = $sql->rowCount();
				//$res = $sql->execute();
				$tab = $sql->fetch(PDO::FETCH_ASSOC);
			}
			return $tab;
		}

		public function recuperation_actif() {
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM session WHERE etat_session = 'Actif';");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}
	}
?>