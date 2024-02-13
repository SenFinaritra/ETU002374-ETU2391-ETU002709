<?php

    require "../../controllers/crud.php";
    require "../../models/TvarieteThe.php";

    $crud=new crud();

    $varieteThe=$crud->select(new TvarieteThe(),"SELECT * FROM TvarieteThe");

?>


<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter prix de vente</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementVente.php">
                        <input type="hidden" name="action" value="ajout">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Variete de the</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idThe" aria-label="Default select example">
                                <option selected="">nom variete de the</option>
                                <?php 
                                
                                    foreach($varieteThe as $the){
                                        ?><option value="<?php echo $the->id; ?>"><?php echo $the->nom; ?></option><?php
                                    }

                                ?>
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">prix :</label>
                            <div class="col-sm-10">
                                <input type="number" name="prix" class="form-control">
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