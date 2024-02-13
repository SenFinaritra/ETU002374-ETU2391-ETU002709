<?php
    class Tdepenses {
        public $id;
        public $dateDepense;
        public $idCategorieDepense;
        public $montant;

        public function __construct($id=null,$dateDepense=null,$idCategorieDepense=null,$montant=null) {
            $this->id = $id;
            $this->dateDepense = $dateDepense;
            $this->idCategorieDepense = $idCategorieDepense;
            $this->montant = $montant;
        }
    }
?>