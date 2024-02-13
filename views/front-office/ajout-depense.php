<?php
    require '../../controllers/crud.php';
    require '../../models/TcategorieDepense.php';

    $crud = new Crud();

    $categories = $crud->select(new TcategorieDepense(),"select * from TcategorieDepense");
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> saisie des dépenses</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementDepense.php" method="get">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Date :</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Choix categorie de depense :</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="ceuilleur" aria-label="Default select example">
                                    <option selected="">Selectionner categorie</option>
                                    <?php foreach($categories as $categorie){ ?>
                                        <option value="<?php echo $categorie->id ?>"><?php echo $categorie->nomdepense ?></option>
                                    <?php } ?>
                              </select>
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Montant de la depense :</label>
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