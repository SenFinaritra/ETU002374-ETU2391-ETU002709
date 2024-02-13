<?php
    class Tceuillettes {
        public $id;
        public $dateCeuillette;
        public $idCeuilleur;
        public $idParcelle;
        public $poids;

        public function __construct($id=null,$dateCeuillette=null,$idCeuilleur=null,$idParcelle=null,$poids=null) {
            $this->id = $id;
            $this->dateCeuillette = $dateCeuillette;
            $this->idCeuilleur = $idCeuilleur;
            $this->idParcelle = $idParcelle;
            $this->poids = $poids;
        }
    }
?>