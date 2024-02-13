<?php
    class Tceuilleurs {
        public $id;
        public $nom;
        public $genre;
        public $dateNaissance;

        public function __construct($id = null , $nom = null, $genre = null, $dateNaissance = null) {
            $this->id = $id;
            $this->nom = $nom;
            $this->genre = $genre;
            $this->dateNaissance = $dateNaissance;
        }
    }
?>