<?php

    require '../models/Tdepenses.php';
    require 'crud.php';

    $date = $_GET['date'];
    $ceuilleur = $_GET['ceuilleur'];
    $poids = $_GET['poids'];

    $crud = new crud();
    $depense = new Tdepenses(null,$date,$ceuilleur,$poids);
    $crud->insert($depense);

    header("location:../views/front-office/accueil.php?view=ajout-depense.php");

?>