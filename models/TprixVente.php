<?php
    class TprixVente {
        public $id;
        public $idThe;
        public $prix;

        public function __construct($id=null,$idThe=null,$prix=null) {
            $this->id = $id;
            $this->idThe = $idThe;
            $this->prix = $prix;
        }
    }
?>