<?php

    require '../models/Tsalaire.php';
    require 'crud.php';

    $action = $_GET['action'];
    $idThe = $_GET['idThe'];
    $salaire = $_GET['salaire'];
    
    $crud = new crud();

    $salaire = new Tsalaire(null, $idThe, $salaire);

    switch ($action) {
        
        case 'ajout':
            $crud->insert($salaire);
            break;

        case 'modification':
            $idObselete = $_GET['idObselete'];
            $obselete = new Tsalaire($idObselete,null,null);
            $crud->update($obselete,$salaire);
            break;

        default:
            $idObselete = $_GET['idObselete'];
            $obselete = new Tsalaire($idObselete,null,null);
            $crud->delete($obselete);
        break;
    }

    header("location:../views/back-office/accueil.php?view=liste-salaire.php");

?>