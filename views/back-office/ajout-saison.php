<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration de la saison de régénération du thé</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
    
    /* Style pour le conteneur principal */
.container {
    width: 400px;
    
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style pour les étiquettes des cases à cocher */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style pour les cases à cocher */
input[type="checkbox"] {
    margin-right: 5px;
}

/* Style pour le bouton d'envoi */
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

/* Style pour le bouton d'envoi lorsqu'il est désactivé */
button:disabled {
    background-color: #999;
    cursor: not-allowed;
}

    </style>
</head>
<body>
    <h2>Configuration de la saison de régénération du thé</h2>
    <form action="../../controllers/traitementSaison.php" method="get">
        <fieldset>
            <legend>Choisissez les mois de régénération du thé :</legend>
            <label><input type="checkbox" name="mois[]" value="1"> Janvier</label><br>
            <label><input type="checkbox" name="mois[]" value="2"> Février</label><br>
            <label><input type="checkbox" name="mois[]" value="3"> Mars</label><br>
            <label><input type="checkbox" name="mois[]" value="4"> Avril</label><br>
            <label><input type="checkbox" name="mois[]" value="5"> Mai</label><br>
            <label><input type="checkbox" name="mois[]" value="6"> Juin</label><br>
            <label><input type="checkbox" name="mois[]" value="7"> Juillet</label><br>
            <label><input type="checkbox" name="mois[]" value="8"> Août</label><br>
            <label><input type="checkbox" name="mois[]" value="9"> Septembre</label><br>
            <label><input type="checkbox" name="mois[]" value="10"> Octobre</label><br>
            <label><input type="checkbox" name="mois[]" value="11"> Novembre</label><br>
            <label><input type="checkbox" name="mois[]" value="12"> Décembre</label><br>
        </fieldset>
        <br>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
