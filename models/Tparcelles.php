<?php
    class Tparcelles {
        public $id;
        public $numero;
        public $surface;
        public $idVariete;
        public $quantitedisponible;

        public function __construct($id = null, $numero = null, $surface = null , $idVariete = null,$quantitedisponible=null) {
            $this->id = $id;
            $this->numero = $numero;
            $this->surface = $surface;
            $this->idVariete = $idVariete;
            $this->quantitedisponible=$quantitedisponible;
        }
    }
?>