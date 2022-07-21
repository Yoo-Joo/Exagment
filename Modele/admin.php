<?php
	include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Admin {
		private $bdd;
		
		public function __construct() {
			$this->bdd = connexion();
		}

		public function insertion($nom, $prenom, $email, $password) {
			$sql = $this->bdd->prepare("INSERT INTO admin (nom_admin, prenom_admin, email_admin, mdp_admin) VALUES(?, ?, ?, ?);");
			$res = $sql->execute(array($nom, $prenom, $email, $password));
			return $res;
		}

		public function modification($id, $nom, $prenom, $email, $password) {
			$sql = $this->bdd->prepare("UPDATE admin SET 
										nom_admin = ?,
										prenom_admin = ?,
										email_admin = ?,
										mdp_admin = ?
										WHERE id_admin = $id;");
			$res = $sql->execute(array($nom, $prenom, $email, $password));
			return $res;

		}

		public function suppression($id) {
			$res = $this->bdd->exec("DELETE FROM admin WHERE id_admin = $id;");
			return $res;
		}

		public function recuperation($id = null) {
			if($id!=null){
				$res = $this->bdd->query("SELECT * FROM admin WHERE id_admin = $id;");
				$obj = $res->fetch(PDO::FETCH_ASSOC);
				return $obj;
			}
			else{
				$tabobj = array();
				$res = $this->bdd->query("SELECT * FROM admin");
				while($obj = $res->fetch(PDO::FETCH_OBJ)){
					$tabobj[] = $obj;
				}
				return $tabobj;
			}
		}

		public function recuperation_email($email) {
			$sql = $this->bdd->query("SELECT * FROM admin WHERE email_admin = '$email'");
			//$res = $sql->execute(array($email));
			$tab = $sql->fetch();
			return $tab;
		}
	}
?>