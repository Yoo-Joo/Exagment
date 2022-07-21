<?php
    include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Matiere {
		private $json;
		
		public function __construct() {
			$this->json = json_decode(file_get_contents("..\Vue\planification.json"));
		}

        public function matiere($id){
            foreach ($this->json as $matiere) {
                if ($matiere->id == $id) {
                    return $matiere->name;
                }
            }
        }

        public function matiere_nom($nom){
            foreach ($this->json as $matiere_nom) {
                if ($matiere_nom->$nom == $nom) {
                    return $matiere_nom->id;
                }
            }
        }
    }
?>