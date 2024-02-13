<?php
    $idObselete = $_GET['idObselete'];
    $nom = $_GET['nom'];
    $genre = $_GET['genre'];
    $datenaissance = $_GET['datenaissance'];
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier le Ceuilleur</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementCeuilleurs.php" method="get">

                        <input type="hidden" name="action" value="modification">
                        <input type="hidden" name="idObselete" value="<?php echo $idObselete ?>">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" class="form-control" value="<?php echo $nom ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Genre :</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="genre" aria-label="Default select example">
                                <option selected="">Selectionner genre</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                                
                              </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Date de Naissance :</label>
                            <div class="col-sm-10">
                                <input type="date" name="datenaissance" class="form-control" value="<?php echo $datenaissance ?>">
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