<?php

    require "../../controllers/crud.php";
    require "../../models/Tparcelles.php";

    $crud=new crud();
    $parcelles=$crud->select(new Tparcelles(),"SELECT * FROM Tparcelles");


?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des parcelles disponible</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Numero</th>
                                <th scope="col">Surface</th>
                                <th scope="col">Variete de The</th>
                                <th scope="col">Quantite </th>

                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                           <?php


                                foreach($parcelles as $parcelle){
                                    ?>
                                     <tr>
                                        <th scope="row"><?php echo $parcelle->id ?></th>
                                        <td><?php echo $parcelle->numero ?></td>
                                        <td><?php echo $parcelle->surface ?></td>
                                        <td><?php echo $parcelle->idVariete ?></td>
                                        <td><?php echo $parcelle->quantitedisponible ?></td>
                                        <td><a href="accueil.php?idObselete=<?php echo $parcelle->id ?>&numeroObselete=<?php echo $parcelle->numero ?>&surfaceObselete=<?php echo $parcelle->surface ?>&idVarieteObselete=<?php echo $parcelle->idVariete ?>&quantiteObselete=<?php echo $parcelle->quantitedisponible ?>&view=modifer-parcelle.php"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                       <td><a href="../../controllers/traitementParcelle.php?idObselete=<?php echo $parcelle->id  ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                                        

                                    </tr>
                                        
                                    
                                    <?php
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