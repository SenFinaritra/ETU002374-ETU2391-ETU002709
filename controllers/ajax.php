<?php

    require '../models/Tceuillettes.php';
    require '../models/Tparcelles.php';
    require 'crud.php';

    $date=$_GET["date"];
    $parcelle=$_GET["parcelle"];
    $poids=$_GET["poids"];
    $ceuilleur=$_GET["ceuilleur"];
    $crud=new crud();

    // $date="2002-2-2";
    // $parcelle=1;
    // $poids=20000000;
    // $ceuilleur=2;
    // $crud=new crud();

    $aff="reussi";
    $cueillette=$crud->select(new Tceuillettes(),"SELECT id,dateCeuillette,idCeuilleur,idParcelle,SUM(poids) as poids FROM Tceuillettes WHERE MONTH(dateCeuillette)=MONTH('$date') GROUP BY idParcelle");
    
    if(count($cueillette)==0){
        
        $parcelle=$crud->select(new Tparcelles(),"SELECT * FROM Tparcelles WHERE id=$parcelle ");
        $quantite=$parcelle[0]->quantitedisponible;
        if($quantite<$poids){
            $aff="erreur";
        }
        
    }
    else if(count($cueillette)>=1) {
        $cueillette1=$cueillette[0]->poids;
        $parcelle=$crud->select(new Tparcelles(),"SELECT * FROM Tparcelles WHERE id=$parcelle ");
        $quantite=$parcelle[0]->quantitedisponible;
        $reste=$quantite-$cueillette1;
        
        if($reste<0){
            $aff="erreur";
        }

    }
    echo $aff;

?>