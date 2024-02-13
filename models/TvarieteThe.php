<?php
    class TvarieteThe {
        public $id;
        public $nom;
        public $occupation;
        public $rendement;

        public function __construct($id = null , $nom = null , $occupation = null , $rendement = null) {
            $this->id = $id;
            $this->nom = $nom;
            $this->occupation = $occupation;
            $this->rendement = $rendement;
        }
    }
?>