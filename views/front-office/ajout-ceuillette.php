<?php
    require '../../controllers/crud.php';
    require '../../models/Tceuilleurs.php';
    require '../../models/Tparcelles.php';

    $crud = new crud();

    $ceuilleurs = $crud->select(new Tceuilleurs(),"select * from Tceuilleurs");
    $parcelles = $crud->select(new Tparcelles(),"select * from Tparcelles");

?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Saisir une nouvelle ceuillette</h5>

                    <!-- General Form Elements -->
                    <form id="form" action="../../controllers/traitementCeuillette.php" method="get">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Date de ceuillette :</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Choix ceuilleur :</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="ceuilleur" aria-label="Default select example">
                                    <option selected="">Selectionner ceuilleur</option>
                                    <?php foreach($ceuilleurs as $ceuilleur){ ?>
                                        <option value="<?php echo $ceuilleur->id ?>"><?php echo $ceuilleur->nom ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Choix Parcelle :</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="parcelle" aria-label="Default select example">
                                    <option selected="">Selectionner parcelle</option>
                                    <?php foreach($parcelles as $parcelle){ ?>
                                        <option value="<?php echo $parcelle->id ?>"><?php echo $parcelle->numero ?></option>
                                    <?php } ?>
                              </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Poids ceuilli :</label>
                            <div class="col-sm-10">
                                <input type="number" name="poids" class="form-control">
                            </div>
                        </div>


                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>

                    </form>
                    <!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
