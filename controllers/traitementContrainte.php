<?php
    require 'crud.php';
    require '../models/TcontrainteJournaliere.php';

    $poids = $_GET['poids'];
    $bonus = $_GET['bonus'];
    $mallus = $_GET['mallus'];

    $crud = new Crud();

    $crud->deleteSql("delete from TcontrainteJournaliere");
    $contrainte = new TcontrainteJournaliere($poids,$bonus,$mallus);
    $crud->insert($contrainte);

    header("location:../views/back-office/accueil.php?view=ajout-contrainte-journaliere.php");
?>