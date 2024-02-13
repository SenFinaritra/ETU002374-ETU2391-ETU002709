<?php

    require '../../controllers/crud.php';
    require '../../models/Tceuillettes.php';
    require '../../models/TcontrainteJournaliere.php';
    require '../../models/Tparcelles.php';
    require '../../models/TprixVente.php';
    require '../../models/Tceuilleurs.php';

    $dateDebut = $_GET['dateDebut'];
    $dateFin = $_GET['dateFin'];

    $crud = new crud();

    $ceuilletteTotal=$crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where dateCeuillette>='$dateDebut' and dateCeuillette<='$dateFin' group by idCeuilleur");
    
    $contrainte=$crud->select(new TcontrainteJournaliere(),"select * from TcontrainteJournaliere")[0];

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
                    <h5 class="card-title">Paiement</h5>

                    <br>
                    <a href="accueil.php?view=recherche-date-paiement.php"><button class="btn-retour">Retour</button></a>
                    <br>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">Nom cueilleur</th>
                        <th scope="col">Poids</th>
                        <th scope="col">% Bonus</th>
                        <th scope="col">% Malus</th>
                        <th scope="col">Montant paiement</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($ceuilletteTotal as $ceuilletteT) {
                        $ceuilletteJournaliere=$crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where dateCeuillette>='$dateDebut' and dateCeuillette<='$dateFin' and idCeuilleur=$ceuilletteT->idCeuilleur group by dateceuillette");
                        $ceuilleur = $crud->select(new Tceuilleurs(),"select * from Tceuilleurs where id = $ceuilletteT->idCeuilleur")[0];
                        $bonus = 0 ;
                        $mallus = 0 ;
                        $remuneration = 0 ;
                        foreach($ceuilletteJournaliere as $ceuilletteJ) {
                          $parcelle = $crud->select(new Tparcelles(),"select * from Tparcelles where id=$ceuilletteJ->idParcelle")[0];
                          $prixVenteThe = $crud->select(new TprixVente(),"select * from TprixVente where idThe=$parcelle->idVariete")[0]->prix;
                          if ($ceuilletteJ->poids < $contrainte->poidsMinimal) {
                            $gainNormal = ($ceuilletteJ->poids * $prixVenteThe);
                            $gainMallus = ($contrainte->poidsMinimal * $contrainte->mallus) / 100;
                            $gain = $gainNormal - $gainMallus ;
                            $remuneration += $gain;
                            $mallus += $contrainte->mallus;
                          }else{
                            $gainNormal = ($ceuilletteJ->poids * $prixVenteThe);
                            $gainBonus = ($contrainte->poidsMinimal * $contrainte->bonus) / 100;
                            $gain = $gainNormal + $gainBonus ;
                            $remuneration += $gain;
                            $bonus += $contrainte->bonus;
                          }
                        } ?>

                      <tr>
                        <td><?php echo $dateDebut ?></td>
                        <td><?php echo $dateFin ?></td>
                        <td><?php echo $ceuilleur->nom ?></td>
                        <td><?php echo $ceuilletteT->poids ?></td>
                        <td><?php echo $bonus ?></td>
                        <td><?php echo $mallus ?></td>
                        <td><?php echo $remuneration ?></td>
                      </tr>

                      <?php }?>

                    </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>


