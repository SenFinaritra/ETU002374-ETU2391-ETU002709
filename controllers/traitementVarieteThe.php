<?php

    require '../models/TvarieteThe.php';
    require 'crud.php';

    $action = $_GET['action'];
    $nom = $_GET['nom'];
    $occupation = $_GET['occupation'];
    $rendement = $_GET['rendement'];

    $crud = new crud();

    $variete = new TvarieteThe(null, $nom, $occupation, $rendement);

    switch ($action) {
        
        case 'ajout':
            $crud->insert($variete);
            break;

        case 'modification':
            $idObselete = $_GET['idObselete'];
            $obselete = new TvarieteThe($idObselete,null,null,null);
            $crud->update($obselete,$variete);
            break;

        default:
            $idObselete = $_GET['idObselete'];
            $obselete = new TvarieteThe($idObselete,null,null,null);
            $crud->delete($obselete);
        break;
    }

    header("location:../views/back-office/accueil.php?view=liste-the.php");
?>