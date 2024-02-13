<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un nouveau Ceuilleur</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementCeuilleurs.php" method="get">

                        <input type="hidden" name="action" value="ajout">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" class="form-control">
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
                                <input type="date" name="datenaissance" class="form-control">
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