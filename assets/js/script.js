window.addEventListener("load", function() {
    function sendData() {
        var xhr;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }

        // Liez l'objet FormData et l'élément form
        var form = document.getElementById("form");
        var formData = new FormData(form);

        // Définissez ce qui se passe si la soumission s'est opérée avec succès
        xhr.addEventListener("load", function(event) {
            var response = event.target.responseText;


            if (response == "reussi") {
                form.submit();
            } else if (response == "erreur") {
                alert("Erreur: Poids disponible insuffisant.");
            }
        });

        // Définissez ce qui se passe en cas d'erreur
        xhr.addEventListener("error", function(event) {
            alert("Erreur: La requête n'a pas pu aboutir.");
        });

        // Configurez la requête
        xhr.open("GET", "../../controllers/ajax.php", true);

        // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
        xhr.send(formData);
    }

    // Accédez à l'élément form et prenez en charge l'événement submit
    var form = document.getElementById("form");
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut
        sendData();
    });
});