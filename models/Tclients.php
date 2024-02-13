<?php
    class Tclients {
        public $id;
        public $nom;
        public $email;
        public $fonction;
        public $password;

        public function __construct($id=null , $nom=null , $email=null , $fonction=null,$password=null) {
            $this->id = $id;
            $this->nom = $nom;
            $this->email = $email;
            $this->fonction=$fonction;
            $this->password = $password;
        }
    }
?>