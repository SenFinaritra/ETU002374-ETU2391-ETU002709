<?php

    require '../../controllers/crud.php';
    require '../../models/TcontrainteJournaliere.php';

    $crud=new crud();
    $contrainte=$crud->select(new TcontrainteJournaliere(),"SELECT * FROM TcontrainteJournaliere");

?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter les contraintes suivantes</h5>

                    <!-- General Form Elements -->
                    <form action="../../controllers/traitementContrainte.php" method="get">

                        <input type="hidden" name="action" value="ajout">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Poids minimal:</label>
                            <div class="col-sm-10">
                                <input type="number" name="poids" value="<?php if(count($contrainte)!=0){echo $contrainte[0]->poidsMinimal;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Bonus(%) :</label>
                            <div class="col-sm-10">
                            <input type="number" name="bonus" value="<?php if(count($contrainte)!=0){echo $contrainte[0]->bonus;} ?>" class="form-control">
                                
                                
                              
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mallus(%) :</label>
                            <div class="col-sm-10">
                            <input type="number" name="mallus" value="<?php if(count($contrainte)!=0){echo $contrainte[0]->mallus;} ?>" class="form-control">
                                
                                
                              
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