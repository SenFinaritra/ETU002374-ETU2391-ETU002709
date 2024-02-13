<?php

    require "../../controllers/crud.php";
    require "../../models/Tsalaire.php";

    $crud=new crud();
    $salaire=$crud->select(new Tsalaire(),"SELECT * FROM Tsalaire");

?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des Configuration salaire</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Id variete de The</th>
                                <th scope="col">Salaire</th>
                                
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                foreach ($salaire as $variete) { ?>
                                    <tr>
                                    <th scope="row"><?php echo $variete->id ?></th>
                                    <td><?php echo $variete->idThe ?></td>
                                    <td><?php echo $variete->salaire ?></td>
                                    <td><a href="accueil.php?idObselete=<?php echo $variete->id ?>&idTheObselete=<?php echo $variete->idThe ?>&salaireObselete=<?php echo $variete->salaire ?>&view=modifier-salaire.php"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                    <td><a href="../../controllers/traitementSalaire.php?idObselete=<?php echo $variete->id  ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>