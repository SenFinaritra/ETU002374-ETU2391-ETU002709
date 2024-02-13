<?php

    require '../models/Tceuillettes.php';
    require 'crud.php';

    $date = $_GET['date'];
    $ceuilleur = $_GET['ceuilleur'];
    $parcelle = $_GET['parcelle'];
    $poids = $_GET['poids'];

    $crud = new crud();
    $ceuillettes = new Tceuillettes(null,$date,$ceuilleur,$parcelle,$poids);
    $crud->insert($ceuillettes);

    header("location:../views/front-office/accueil.php?view=ajout-ceuillette.php");

?>