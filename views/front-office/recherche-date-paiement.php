<div class="container mt-5">
  <h2>Sélection de Dates pour la liste des Paiements</h2>

  <form action="liste-paiement.php" method="get">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="dateDebut">Date de début</label>
        <input type="date" class="form-control" name="dateDebut" required>
      </div>
      <div class="form-group col-md-6">
        <label for="dateFin">Date de fin</label>
        <input type="date" class="form-control" name="dateFin" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
</div>