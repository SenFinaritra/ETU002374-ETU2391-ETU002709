
<?php

    require "../../controllers/crud.php";
    require "../../models/TvarieteThe.php";

    $crud=new crud();
    $variete=$crud->select(new TvarieteThe(),"SELECT * FROM TvarieteThe");

?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier la parcelle</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementParcelle.php" method="get">
                        <input type="hidden" name="action" value="modification">
                        <input type="hidden" name="idObselete" value="<?php echo $_GET["idObselete"] ?>">
                        <div class="row mb-3">

                            <label for="inputText" class="col-sm-2 col-form-label">Numero :</label>
                            <div class="col-sm-10">
                                <input type="number" name="numero" value="<?php echo $_GET["numeroObselete"] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Surface :</label>
                            <div class="col-sm-10">
                                <input type="number" name="surface" value="<?php echo $_GET["surfaceObselete"] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Variete de the</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idVariete" aria-label="Default select example">
                                <option selected="">nom variete de the</option>
                                <?php

                                    foreach($variete as $the){
                                        ?><option value="<?php echo $the->id ?>"><?php echo $the->nom ?></option><?php
                                    }

                                ?>
                              </select>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Quantite disponible:</label>
                            <div class="col-sm-10">
                                <input type="number" name="quantite" value="<?php //echo $_GET["quantiteObselete"] ?>" class="form-control">
                            </div>
                        </div> -->


                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>

                    </form>
                    <!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>