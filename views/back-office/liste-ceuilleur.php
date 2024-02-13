<?php
    require '../../controllers/crud.php';
    require '../../models/Tceuilleurs.php';

    $crud = new crud();
    $ceuilleurs = $crud->select(new Tceuilleurs(),"select * from Tceuilleurs");

?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des ceuilleurs</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Date de Naissance</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ceuilleurs as $ceuilleur) { ?>
                                <tr>
                                <th scope="row"><?php echo $ceuilleur->id ?></th>
                                <td><?php echo $ceuilleur->nom ?></td>
                                <td><?php echo $ceuilleur->genre ?></td>
                                <td><?php echo $ceuilleur->dateNaissance ?></td>
                                <td><a href="accueil.php?idObselete=<?php echo $ceuilleur->id ?>&nom=<?php echo $ceuilleur->nom ?>&genre=<?php echo $ceuilleur->genre ?>&datenaissance=<?php echo $ceuilleur->dateNaissance ?>&view=modifier-ceuilleur.php"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                <td><a href="../../controllers/traitementCeuilleurs.php?idObselete=<?php echo $ceuilleur->id ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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