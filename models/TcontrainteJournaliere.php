<?php
    class TcontrainteJournaliere{
        public $poidsMinimal;
        public $bonus;
        public $mallus;

        public function __construct($poidsMinimal=null,$bonus=null,$mallus=null) {
            $this->poidsMinimal = $poidsMinimal;
            $this->bonus = $bonus;
            $this->mallus = $mallus;
        }
    }
?>