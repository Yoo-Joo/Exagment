<?php
    include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Filiere {
		private $json;
		
		public function __construct() {
			$this->json = json_decode(file_get_contents("..\Vue\planification.json"));
		}

        public function filiere($id){
            foreach ($this->json as $filiere) {
                if ($filiere->id == $id) {
                    return $filiere->name;
                }
            }
        }

        public function filiere_nom($nom){
            foreach ($this->json as $filiere_nom) {
                if ($filiere_nom->$nom == $nom) {
                    return $filiere_nom->id;
                }
            }
        }
    }
?>