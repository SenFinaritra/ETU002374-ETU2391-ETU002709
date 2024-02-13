<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter une nouvelle variete de The</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementVarieteThe.php" method="get">

                        <input type="hidden" name="action" value="ajout">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Occupation :</label>
                            <div class="col-sm-10">
                                <input type="number" name="occupation" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Rendement :</label>
                            <div class="col-sm-10">
                                <input type="number" name="rendement" class="form-control">
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