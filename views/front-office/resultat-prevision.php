<?php

    require '../../controllers/crud.php';
    require '../../models/Tceuillettes.php';
    require '../../models/Tparcelles.php';
    require '../../models/TvarieteThe.php';
    require '../../models/Tsaison.php';
    require '../../models/TprixVente.php';
    require '../../models/TcontrainteJournaliere.php';
    require '../../models/Tdepenses.php';

    $date=$_GET["date"];
    
    $crud=new crud();

    $ceuillette=$crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where month(dateCeuillette)=month('$date') group by idParcelle");


?>
<style>/* Style de la section */
.section {
    padding: 20px;
}

/* Style de la carte */
.card {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 24px;
    margin-bottom: 15px;
}

/* Style de la table */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}
/* Style du bouton retour */
.btn-retour {
    background-color: #007bff; /* Couleur de fond */
    color: #fff; /* Couleur du texte */
    padding: 10px 20px; /* Espacement intérieur */
    border: none; /* Suppression de la bordure */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur au survol */
    text-decoration: none; /* Suppression de la soulignement du texte */
    transition: background-color 0.3s ease; /* Animation de transition */
}

.btn-retour:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
}

.table th {
    background-color: #f2f2f2;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #e9e9e9;
}
</style>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des prevision</h5>

                    <br>
                    <a href="accueil.php?view=prevision.php"><button class="btn-retour">Retour</button></a>
                    <br>
                    <br>

                    

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">id parcelle</th>
                                <!-- somme an'poids cueillette rehetra natao -->
                                <th scope="col">Variete Planter</th>
                                <!-- ny poids tavela sisa -->
                                <th scope="col">Surface</th>
                                <!-- prix an'le poid total cueillette natao -->
                                <th scope="col">Nombre de pied</th>
                                <!-- karaman'ceuilleur + depense -->
                                <th scope="col">Poids the restant</th>
                                <!-- montant des ventes - montant des depenses -->
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $total=0;
                            for ($i=0; $i <count($ceuillette) ; $i++) { 
                               ?><tr><?php 
                                $parcelle=$crud->selectObject(new Tparcelles($ceuillette[$i]->idParcelle,null,null,null,null));
                                ?><td><?php echo $parcelle[0]->id; ?></td><?php
                                
                                //ventes
                                $variethe=$crud->selectObject(new TvarieteThe($parcelle[0]->idVariete),null,null,null);
                                ?><td><?php echo $variethe[0]->nom ?></td><?php
                                //depense
                                
                                ?><td><?php echo $parcelle[0]->surface ?></td><?php
                                $nbPied=$parcelle[0]->surface/$variethe[0]->occupation;
                                ?><td><?php echo $nbPied ?> Pied</td><?php
                                $rest=$parcelle[0]->quantitedisponible-$ceuillette[$i]->poids;
                                ?><td><?php echo $rest  ?></td></tr><?php
                                $total+=$rest;
                                
                            }
                            
                           ?>
                        </tbody>
                    </table>


                    <h4>Poid totat The restant : <?php echo $total ?></h4>
                    <h4>montant :</h4>

                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>


