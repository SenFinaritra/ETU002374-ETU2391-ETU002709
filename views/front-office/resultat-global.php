<?php

    require '../../controllers/crud.php';
    require '../../models/Tceuillettes.php';
    require '../../models/Tparcelles.php';
    require '../../models/Tsalaire.php';
    require '../../models/Tsaison.php';
    require '../../models/TprixVente.php';
    require '../../models/TcontrainteJournaliere.php';
    require '../../models/Tdepenses.php';

    $debut=$_GET["dateDebut"];
    $fin=$_GET["dateFin"];

    $crud=new crud();

    $ceuillette=$crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where dateCeuillette>='$debut' and dateCeuillette<='$fin' group by idParcelle");

    $saisons = $crud->select(new Tsaison(),"select * from Tsaison");
    $nombreSaison = 1 ;
    foreach($saisons as $saison) {
        $moisDebut = date("m",strtotime($debut));
        $moisFin = date("m", strtotime($fin));
        if ($moisDebut>=$saison->mois && $moisFin<=$saison->mois) {
            $nombreSaison++;
        }
    }

    $depenseAutreValue = 0 ;
    $depensesAutre = $crud->select(new Tdepenses(),"select * from Tdepenses where dateDepense>='$debut' and dateDepense<='$fin'");
    if (count($depensesAutre) != 0) {
        foreach ($depensesAutre as $depense){
            $depenseAutreValue += $depense->montant;
        }
    }
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
                    <h5 class="card-title">Liste des resultats sur chaque parcelle</h5>

                    <br>
                    <a href="accueil.php?view=recherche-date.php"><button class="btn-retour">Retour</button></a>
                    <br>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">id parcelle</th>
                                <!-- somme an'poids cueillette rehetra natao -->
                                <th scope="col">Poids total cueillette</th>
                                <!-- ny poids tavela sisa -->
                                <th scope="col">Poids restant</th>
                                <!-- prix an'le poid total cueillette natao -->
                                <th scope="col">Montant des ventes</th>
                                <!-- karaman'ceuilleur + depense -->
                                <th scope="col">Montant des dépenses</th>
                                <!-- montant des ventes - montant des depenses -->
                                <th scope="col">Bénéfice</th>
                                <!-- tsy aiko -->
                                <th scope="col">Coût de revient par kg</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           
                            for ($i=0; $i <count($ceuillette) ; $i++) { 
                                
                                $parcelle=$crud->selectObject(new Tparcelles($ceuillette[$i]->idParcelle,null,null,null,null));

                                $idThePlante = $parcelle[0]->idVariete;
                                $prixThe = $crud->selectObject(new TprixVente(null,$idThePlante,null))[0]->prix;
                                //ventes
                                $montantDesVentes = $ceuillette[$i]->poids * $prixThe;

                                //depense
                                $ceuilletteJournaliere = $crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where dateCeuillette>='$debut' and dateCeuillette<='$fin' group by dateCeuillette");
                                $contrainte = $crud->select(new TcontrainteJournaliere(),"select * from TcontrainteJournaliere")[0];
                                $mallus = $contrainte->mallus;
                                $bonus = $contrainte->bonus;
                                $depense = 0 ;
                               
                                //depense karama
                                foreach($ceuilletteJournaliere as $journaliere) {
                                    if ($journaliere->poids < $contrainte->poidsMinimal) {
                                        $gainMallus = ($mallus * $contrainte->poidsMinimal)/100;
                                        $gain = ($journaliere->poids * $prixThe) - $gainMallus;
                                        $depense += $gain;
                                    }else{
                                        $gainBonus = ($bonus * $contrainte->poidsMinimal)/100;
                                        $gain = ($journaliere->poids * $prixThe) + $gainBonus;
                                        $depense += $gain;
                                    }
                                }

                                $reste=($parcelle[0]->quantitedisponible * $nombreSaison)-$ceuillette[$i]->poids;
                                ?><tr>
                                    <td><?php echo $ceuillette[$i]->idParcelle ?></td>
                                    <td><?php echo $ceuillette[$i]->poids ?></td>
                                    <td><?php echo $reste ?></td>
                                    <td><?php echo $montantDesVentes ?></td>
                                    <td><?php echo $depense + $depenseAutreValue ?></td>
                                    <td><?php echo $montantDesVentes - ($depense + $depenseAutreValue) ?></td>
                                    <td><?php echo ($depense + $depenseAutreValue)/$ceuillette[$i]->poids ?></td>
                                </tr><?php
                            }
                          
                           ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>


