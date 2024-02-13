<?php
    class Tsalaire {
        public $id;
        public $idThe;
        public $salaire;

        public function __construct($id=null,$idThe=null,$salaire=null){
            $this->id = $id;
            $this->idThe = $idThe;
            $this->salaire = $salaire;
        }

    }
?>