<?php

    require 'crud.php';
    require '../models/Tceuillettes.php';
    require '../models/Tparcelles.php';
    require '../models/Tsalaire.php';

    $debut=$_GET["dateDebut"];
    $fin=$_GET["dateFin"];

    $crud=new crud();

    $ceuillette=$crud->select(new Tceuillettes(),"select id,dateCeuillette,idCeuilleur,idParcelle,sum(poids) as poids from Tceuillettes where dateCeuillette>='$debut' and dateCeuillette<='$fin' group by idParcelle");

    
    

?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des varietes de The</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">id parcelle</th>
                                <th scope="col">Poids total cueillette</th>
                                <th scope="col">Poids restant</th>
                                
 
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           
                            for ($i=0; $i <count($ceuillette) ; $i++) { 
                                
                                $parcelle=$crud->selectObject(new Tparcelles($ceuillette[$i]->idParcelle,null,null,null,null));
                                $reste=$parcelle[0]->quantitedisponible-$ceuillette[$i]->poids;
                                ?><tr>
                                    <td><?php echo $ceuillette[$i]->id ?></td>
                                    <td><?php echo $ceuillette[$i]->poids ?></td>
                                    <td><?php echo $reste ?></td>

                                </tr><?php
                            }
                            // header("Location:../views/front-office/accueil.php?view=../../controllers/traitementRecherche.php");
                           ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

