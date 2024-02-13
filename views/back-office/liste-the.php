<?php

    require '../../controllers/crud.php';
    require '../../models/TvarieteThe.php';

    $crud = new crud();
    $varieteThe = $crud->select(new TvarieteThe(),"select * from TvarieteThe");
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
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Rendement</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($varieteThe as $variete) { ?>
                                    <tr>
                                    <th scope="row"><?php echo $variete->id ?></th>
                                    <td><?php echo $variete->nom ?></td>
                                    <td><?php echo $variete->occupation ?></td>
                                    <td><?php echo $variete->rendement ?></td>
                                    <td><a href="accueil.php?idObselete=<?php echo $variete->id ?>&nomObselete=<?php echo $variete->nom ?>&occupationObselete=<?php echo $variete->occupation ?>&rendementObselete=<?php echo $variete->rendement ?>&view=modifier-the.php"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                    <td><a href="../../controllers/traitementVarieteThe.php?idObselete=<?php echo $variete->id  ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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