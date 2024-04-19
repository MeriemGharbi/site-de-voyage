document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById("formulaire");
    form.addEventListener('submit', function(event) {
        var x, error;

        // Validation du champ "Nom User"
        x = document.forms["inscription"]["nom"].value;
        error = document.getElementById("nom");
        var letters = new RegExp("^[A-Za-z]+$");
        if (x.length < 1) {
            error.innerText = "Le nom doit contenir au minimum un caractère";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else if (!letters.test(x)) {
            error.innerText = "Le nom doit contenir que des lettres";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            error.innerText = "";
        }

        // Validation du champ "Prenom User"
        x = document.forms["inscription"]["adresse"].value;
        error = document.getElementById("adresse");
        if (x.length < 1) {
            error.innerText = "Le adresse doit contenir au minimum un caractère";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else if (!letters.test(x)) {
            error.innerText = "Le adresse doit contenir que des lettres";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            error.innerText = "";
        }

        // Validation du champ "Cin User"
        x = document.forms["inscription"]["id"].value;
        error = document.getElementById("id");
        var cinRegex = new RegExp("[0-9]{8}");
        if (!cinRegex.test(x) || x.length !== 8){
            error.innerText = "Veuillez entrer un id valide (8 chiffres)";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            error.innerText = "";
        }

        // Validation du champ "Phone User"
        x = document.forms["inscription"]["phone"].value;
        error = document.getElementById("phone");
        var phoneRegex = new RegExp("[0-9]{8}");
        if (!phoneRegex.test(x) || x.length !== 8) {
            error.innerText = "Veuillez entrer un numéro de téléphone valide (8 chiffres)";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            error.innerText = "";
        }

        // Validation du champ "Date De Naissance"
        var dateInput = document.forms["inscription"]["startdate"].value;
        error = document.getElementById("startdate");
        if (dateInput === "") {
            error.innerText = "Veuillez choisir une startdate.";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            var date = new Date(dateInput);
            var sysDate = new Date();
            if (date > sysDate) {
                error.innerText = "La startdate doit être inférieure à la date d'aujourd'hui.";
                error.style.color = "red";
                event.preventDefault(); // Empêche la soumission du formulaire
            } else {
                error.innerText = "";
            }
        }

        // Validation du champ "Email User"
        x = document.forms["inscription"]["email"].value;
        error = document.getElementById("email");
        var emailRegex = new RegExp(".+@gmail.com");
        if (!emailRegex.test(x)) {
            error.innerText = "Veuillez entrer une adresse mail valide";
            error.style.color = "red";
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            error.innerText = "";
        }

       
    });
});
