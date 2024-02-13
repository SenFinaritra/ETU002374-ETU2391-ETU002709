<?php

    require '../../controllers/crud.php';
    require '../../models/TcategorieDepense.php';

    $crud = new crud();
    $categorie = $crud->select(new TcategorieDepense(),"select * from TcategorieDepense");
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des categories de depense</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                foreach ($categorie as $variete) { ?>
                                    <tr>
                                    <th scope="row"><?php echo $variete->id ?></th>
                                    <td><?php echo $variete->nomdepense ?></td>
                                    <td><a href="accueil.php?idObselete=<?php echo $variete->id ?>&nomObselete=<?php echo $variete->nomdepense ?>&view=modifier-categorie-depense.php"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                    <td><a href="../../controllers/traitementCategorieDepense.php?idObselete=<?php echo $variete->id  ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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