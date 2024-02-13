<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><p>Recherche entre deux dates</p></h5>

        
              
            <form action="resultat-global.php" method="GET">
            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date de début</label>
                            <div class="col-sm-10">
                               
                            <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
                            </div>
                        </div>
             <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date de Fin</label>
                            <div class="col-sm-10">
                               
                            <input type="date" class="form-control" id="dateFin" name="dateFin" required>
                            </div>
                        </div>
             
              <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
          


</div>
            </div>

        </div>


    </div>
</section>