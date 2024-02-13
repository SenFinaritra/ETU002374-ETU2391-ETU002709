<?php

    require '../models/TcategorieDepense.php';
    require 'crud.php';

    $action = $_GET['action'];
    $nom = $_GET['nom'];
    
    $crud = new crud();

    $depense = new TcategorieDepense(null, $nom);
    

    switch ($action) {
        
        case 'ajout':
            $crud->insert($depense);
            break;

        case 'modification':
            $idObselete = $_GET['idObselete'];
            $obselete = new TcategorieDepense($idObselete,null);
            $crud->update($obselete,$depense);
            break;

        default:
            $idObselete = $_GET['idObselete'];
            $obselete = new TcategorieDepense($idObselete,null);
            $crud->delete($obselete);
        break;
    }

    header("location:../views/../views/back-office/accueil.php?view=liste-categorie-depense.php");

?>