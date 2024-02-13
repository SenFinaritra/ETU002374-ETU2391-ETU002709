
<?php
    $idObselete = $_GET['idObselete'];
    $nomObselete = $_GET['nomObselete'];
    
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier la categorie de depenses</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementCategorieDepense.php">
                        <input type="hidden" name="action" value="modification">
                        <input type="hidden" name="idObselete" value="<?php echo $idObselete ?>">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" value="<?php echo $nomObselete; ?>" class="form-control">
                            </div>
                        </div>





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