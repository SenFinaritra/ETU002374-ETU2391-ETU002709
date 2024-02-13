<?php

    require 'outils.php';
    require 'crud.php';
    require '../models/Tclients.php';

    $email = $_GET['email'];
    $password = $_GET['passe'];

    $outils = new outils();
    if(!$outils->authentification($email,$password)){
        header("Location:../index.php");
    }

?>