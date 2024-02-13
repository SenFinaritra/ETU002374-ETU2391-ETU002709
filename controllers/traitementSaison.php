<?php

    require 'crud.php';
    require '../models/Tsaison.php';

    $crud = new crud();

    $crud->deleteSql("delete from Tsaison");

    $moisSelection = $_GET['mois'];
    foreach($moisSelection as $mois) {
        $Tsaison = new Tsaison($mois);
        $crud->insert($Tsaison);
    }

    header("location:../views/back-office/accueil.php?view=ajout-saison.php");
?>