<?php
	include_once '..\Database\connexion.php';
	/**
	 *
	 */
	class Enseignant {
		private $bdd;
		
		public function __construct() { 
			$this->bdd = connexion();
		}

		public function insertion($nom, $prenom, $email, $dept, $password, $credit, $etat) {
			$sql = $this->bdd->prepare("INSERT INTO enseignant (nom_enseignant, prenom_enseignant, adresse_mail, departement, mdp_enseignant, credit, etat_enseignant) VALUES(?, ?, ?, ?, ?, ?, ?);");
			$res = $sql->execute(array($nom, $prenom, $email, $dept, $password, $credit, $etat));
			return $res;
		}

		public function modification($id, $nom, $prenom, $email, $dept, $credit, $etat) {
			$sql = $this->bdd->prepare("UPDATE enseignant SET 
										nom_enseignant = ?,
										prenom_enseignant = ?,
										adresse_mail = ?,
										departement = ?,
										credit = ?,
										etat_enseignant = ?
										WHERE id_enseignant = $id;");
			$res = $sql->execute(array($nom, $prenom, $email, $dept, $credit, $etat));
			return $res;
		}

		public function modification_ens($id, $nom, $prenom, $email, $mdp) {
			$sql = $this->bdd->prepare("UPDATE enseignant SET 
										nom_enseignant = ?,
										prenom_enseignant = ?,
										adresse_mail = ?,
										mdp_enseignant = ?
										WHERE id_enseignant = $id;");
			$res = $sql->execute(array($id, $nom, $prenom, $email, $mdp));
			return $res;
		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM enseignant WHERE id_enseignant = $id;");
			return $res;
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM enseignant WHERE id_enseignant = $id;");
				$obj = $res->fetch(PDO::FETCH_ASSOC);
				return $obj;
			}
			else{
				$tabobj = array();
				$res = $this->bdd->query("SELECT * FROM enseignant");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

		public function recuperation_email($email) {
			$sql = $this->bdd->query("SELECT * FROM enseignant WHERE adresse_mail = '$email'");
			//$res = $sql->execute();
			$tab = $sql->fetch();
			return $tab;
		}

		public function recuperation_actif() {
			$tabobj = array();
			$res = $this->bdd->query("SELECT * FROM enseignant WHERE etat_enseignant = 'Actif'");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}

		public function affectation($idl, $ids) {
			//litse des locaux qui on meme id
			$sql = $this->bdd->query("SELECT id_enseignant FROM affectation a, session s
										WHERE a.id_local = $idl AND s.id_session = $ids;");
			//$res = $sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			return $tab;
		}

		public function recuperation_ens() {
			$sql = $this->bdd->prepare("SELECT id_enseignant FROM enseignant order by RAND() LIMIT 1");
			$sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			$id = $tab[0];
			return (int)$id;
		}

		/*$sql = $this->bdd->prepare("SELECT credit FROM enseignant WHERE id_enseignant = $id");
			$sql->execute();
			$tab = $sql->fetch(PDO::FETCH_NUM);
			$crdo = $tab[0];
			$crd = $crdo + 1;*/

		public function incrementer_crd($id, $crd) {
			$sql1 = $this->bdd->prepare("UPDATE enseignant SET credit = ? WHERE id_enseignant = $id");
			$sql1->execute(array($id, $crd));
			$tab1 = $sql1->fetch(PDO::FETCH_NUM); 
			$crdf = $tab1[0];
			return (int)$crdf;
		}

		public function nom_ens($id) {
			$res = $this->bdd->query("SELECT nom_enseignant, prenom_enseignant FROM enseignant WHERE id_enseignant = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function id_ens($id) {
			$res = $this->bdd->query("SELECT id_enseignant FROM affectation WHERE id_affectation = $id;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function id_nom_ens($nom, $prenom) {
			$res = $this->bdd->query("SELECT id_enseignant FROM enseignant WHERE nom_enseignant = $nom AND prenom_enseignant = $prenom;");
			$obj = $res->fetch(PDO::FETCH_OBJ);
			return $obj;
		}

		public function recuperation_list() {
			$tabobj = array();
			$res = $this->bdd->query("SELECT id_enseignant, nom_enseignant, prenom_enseignant FROM enseignant WHERE etat_enseignant = 'Actif' AND id_enseignant NOT IN (SELECT id_enseignant FROM contrainte)");
			while($obj = $res->fetch(PDO::FETCH_OBJ)){
				$tabobj[] = $obj;
			}
			return $tabobj;
		}
	}
?>