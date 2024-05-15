
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById("formulaire");
    form.addEventListener('submit', function(event) {
        var x, error;
        x = document.forms["inscription"]["cin"].value;
        error = document.getElementById("cin").attributes["required"] = "";
        x = document.forms["inscription"]["nom"].value;
        error = document.getElementById("nom").attributes["required"] = "";
        x = document.forms["inscription"]["prenom"].value;
        error = document.getElementById("prenom").attributes["required"] = "";
        x = document.forms["inscription"]["d_n"].value;
        error = document.getElementById("d_n").attributes["required"] = "";
        x = document.forms["inscription"]["phone"].value;
        error = document.getElementById("phone");
        var phoneRegex = new RegExp("[0-9]{8}");
        if (!phoneRegex.test(x) || x.length !== 8 ) {
            error.innerText = "Veuillez entrer un numéro de téléphone valide (8 chiffres)";
            error.style.color = "red";
            event.preventDefault(); 
        } else {
            error.innerText = "";
        }
        x = document.forms["inscription"]["email"].value;
        error = document.getElementById("email");
        var emailRegex = new RegExp(".+@gmail.com");
        if (!emailRegex.test(x)) {
            error.innerText = "Veuillez entrer une adresse mail valide";
            error.style.color = "red";
            event.preventDefault();
        } else {
            error.innerText = "";
        }
        
    });
});
