<?php
    class TcategorieDepense {
        public $id;
        public $nomdepense;

        public function __construct($id = null, $nom = null) {
            $this->id = $id;
            $this->nomdepense = $nom;
        }
    }
?>