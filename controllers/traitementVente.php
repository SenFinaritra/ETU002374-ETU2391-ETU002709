<?php
    
    require 'crud.php';
    require '../models/TprixVente.php';

    $idThe = $_GET['idThe'];
    $prix = $_GET['prix'];

    $prixVente = new TprixVente(null, $idThe, $prix);

    $crud = new Crud();

    $ifIsset = $crud->select(new TprixVente(),"select * from TprixVente where idThe = $idThe");
    if (count($ifIsset)!=0) {
        $crud->deleteSql("delete from TprixVente where idThe = $idThe");
        $crud->insert($prixVente);
    }else{
        $crud->insert($prixVente);
    }

    header("location:../views/back-office/accueil.php?view=ajout-prix-vente.php");

?>