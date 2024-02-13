<?php

    require '../models/Tceuilleurs.php';
    require 'crud.php';

    $action = $_GET['action'];
    $nom = $_GET['nom'];
    $genre = $_GET['genre'];
    $datenaissance = $_GET['datenaissance'];

    $crud = new crud();

    $ceuilleur = new Tceuilleurs(null, $nom, $genre, $datenaissance);
    

    switch ($action) { 

        case 'ajout':
            $crud->insert($ceuilleur);
            break;

        case 'modification':
            $idObselete = $_GET['idObselete'];
            $obselete = new Tceuilleurs($idObselete,null,null,null);
            $crud->update($obselete,$ceuilleur);
            break;

        default:
            $idObselete = $_GET['idObselete'];
            $obselete = new Tceuilleurs($idObselete,null,null,null);
            $crud->delete($obselete);
        break;
    }

    header("location:../views/back-office/accueil.php?view=liste-ceuilleur.php");

?>