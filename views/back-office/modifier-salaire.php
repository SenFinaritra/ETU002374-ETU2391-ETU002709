
<?php
    $idObselete = $_GET['idObselete'];
    $idTheObselete = $_GET['idTheObselete'];
    $salaire=$_GET['salaireObselete'];
    
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier la Configuration Salaire</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementSalaire.php">
                        <input type="hidden" name="action" value="modification">
                        <input type="hidden" name="idObselete" value="<?php echo $idObselete ?>">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">id variete de the :</label>
                            <div class="col-sm-10">
                                <input type="number" name="idThe" value="<?php echo $idTheObselete; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">salaire :</label>
                            <div class="col-sm-10">
                                <input type="number" name="salaire" value="<?php echo $salaire; ?>" class="form-control">
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