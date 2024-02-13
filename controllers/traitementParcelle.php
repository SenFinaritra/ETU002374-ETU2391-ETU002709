<?php

    require '../models/Tparcelles.php';
    require '../models/TvarieteThe.php';
    require 'crud.php';

    $action = $_GET['action'];
    $numero = $_GET['numero'];
    $surface = $_GET['surface'];
    $idVariete = $_GET['idVariete'];
    // $quantiteDisponible = $_GET['quantite'];

    $crud = new crud();
    
   

    switch ($action) {
        
        case 'ajout':
            $variete=$crud->selectObject(new TvarieteThe($idVariete,null,null,null));
            if(count($variete)==0){
                header("../views/back-office/accueil.php");
            }
            $nbpied=($surface*10000)/$variete[0]->occupation;
            $quantiteDisponible=$nbpied*$variete[0]->rendement;
            $parcelle = new Tparcelles(null,$numero ,$surface,$idVariete,$quantiteDisponible);
            $crud->insert($parcelle);
            break;

        case 'modification':
            $idObselete = $_GET['idObselete'];
            $obselete = new Tparcelles($idObselete,null,null,null,null);
            $variete=$crud->selectObject(new TvarieteThe($idVariete,null,null,null));
            if(count($variete)==0){
                header("../views/back-office/accueil.php");
            }
            $nbpied=($surface*10000)/$variete[0]->occupation;
            $quantiteDisponible=$nbpied*$variete[0]->rendement;
            $parcelle = new Tparcelles(null,$numero ,$surface,$idVariete,$quantiteDisponible);
            $crud->update($obselete,$parcelle);
            break;

        default:
            $idObselete = $_GET['idObselete'];
            $obselete = new Tparcelles($idObselete,null,null,null,null);
            $crud->delete($obselete);
        break;
    }

    header("location:../views/back-office/accueil.php?view=liste-parcelle.php");

?>