<?php
    include_once '..\Database\connexion.php';
	/**
	 * 
	 */
	class Semestre {
		private $json;
		
		public function __construct() {
			$this->json = json_decode(file_get_contents("..\Vue\planification.json"));
		}

        public function semestre($id){
            foreach ($this->json as $semestre) {
                if ($semestre->id == $id) {
                    return $semestre->name;
                }
            }
        }

        public function semestre_nom($nom){
            foreach ($this->json as $semestre_nom) {
                if ($semestre_nom->$nom == $nom) {
                    return $semestre_nom->id;
                }
            }
        }
    }
?>