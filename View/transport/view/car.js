document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("carForm");
    const marqueInput = document.getElementById("marque");
    const errorMarqueMessage = document.getElementById("error-marque");
    const validMarqueMessage = document.getElementById("valid-marque");

    function validateMarque() {
        const marqueValue = marqueInput.value.trim();
        return marqueValue !== "" && /^[a-zA-Z\s]*$/.test(marqueValue);
    }

    function displayMarqueError() {
        const marqueValue = marqueInput.value.trim();
        if (marqueValue === "") {
            errorMarqueMessage.textContent = "Veuillez remplir le champ 'marque'";
            errorMarqueMessage.style.visibility = "visible"; // Show error message for empty field
            validMarqueMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateMarque()) {
            errorMarqueMessage.textContent = "Le champ 'marque' ne peut contenir que des lettres et des espaces";
            errorMarqueMessage.style.visibility = "visible"; // Show error message when validation fails
            validMarqueMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorMarqueMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validMarqueMessage.textContent = "Marque valide";
            validMarqueMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Marque only when the form is submitted
        if (!displayMarqueError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Marque
    errorMarqueMessage.style.visibility = "hidden";

    ///////////////////////
    const modeleInput = document.getElementById("modele");
    const errorModeleMessage = document.getElementById("error-modele");
    const validModeleMessage = document.getElementById("valid-modele");

    function validateModele() {
        const modeleValue = modeleInput.value.trim();
        return modeleValue !== "" && /^[a-zA-Z\s]*$/.test(modeleValue);
    }

    function displayModeleError() {
        const modeleValue = modeleInput.value.trim();
        if (modeleValue === "") {
            errorModeleMessage.textContent = "Veuillez remplir le champ 'modele'";
            errorModeleMessage.style.visibility = "visible"; // Show error message for empty field
            validModeleMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateModele()) {
            errorModeleMessage.textContent = "Le champ 'modele' ne peut contenir que des lettres et des espaces";
            errorModeleMessage.style.visibility = "visible"; // Show error message when validation fails
            validModeleMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorModeleMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validModeleMessage.textContent = "Modèle valide";
            validModeleMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Modele only when the form is submitted
        if (!displayModeleError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Modele
    errorModeleMessage.style.visibility = "hidden";

    ///////////////////////
    const anneeInput = document.getElementById("annee");
    const errorAnneeMessage = document.getElementById("error-annee");
    const validAnneeMessage = document.getElementById("valid-annee");

    function validateAnnee() {
        const anneeValue = anneeInput.value.trim();
        return anneeValue !== "" && /^\d{4}$/.test(anneeValue);
    }

    function displayAnneeError() {
        const anneeValue = anneeInput.value.trim();
        if (anneeValue === "") {
            errorAnneeMessage.textContent = "Veuillez remplir le champ 'année'";
            errorAnneeMessage.style.visibility = "visible"; // Show error message for empty field
            validAnneeMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateAnnee()) {
            errorAnneeMessage.textContent = "Le champ 'année' doit être une année valide";
            errorAnneeMessage.style.visibility = "visible"; // Show error message when validation fails
            validAnneeMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorAnneeMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validAnneeMessage.textContent = "Année valide";
            validAnneeMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Annee only when the form is submitted
        if (!displayAnneeError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Annee
    errorAnneeMessage.style.visibility = "hidden";

    ///////////////////////
    const prixJourInput = document.getElementById("prix_journee");
    const errorPrixJourMessage = document.getElementById("error-prix-jour");
    const validPrixJourMessage = document.getElementById("valid-prix-jour");

    function validatePrixJour() {
        const prixJourValue = prixJourInput.value.trim();
        return prixJourValue !== "" && /^\d+$/.test(prixJourValue);
    }

    function displayPrixJourError() {
        const prixJourValue = prixJourInput.value.trim();
        if (prixJourValue === "") {
            errorPrixJourMessage.textContent = "Veuillez remplir le champ 'prix par jour'";
            errorPrixJourMessage.style.visibility = "visible"; // Show error message for empty field
            validPrixJourMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorPrixJourMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validPrixJourMessage.textContent = "Prix par jour valide";
            validPrixJourMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate PrixJour only when the form is submitted
        if (!displayPrixJourError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for PrixJour
    errorPrixJourMessage.style.visibility = "hidden";

    ///////////////////////
    const couleurInput = document.getElementById("couleur");
    const errorCouleurMessage = document.getElementById("error-couleur");
    const validCouleurMessage = document.getElementById("valid-couleur");

    function validateCouleur() {
        const couleurValue = couleurInput.value.trim();
        return couleurValue !== "" && /^[a-zA-Z\s]*$/.test(couleurValue);
    }

    function displayCouleurError() {
        const couleurValue = couleurInput.value.trim();
        if (couleurValue === "") {
            errorCouleurMessage.textContent = "Veuillez remplir le champ 'couleur'";
            errorCouleurMessage.style.visibility = "visible"; // Show error message for empty field
            validCouleurMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateCouleur()) {
            errorCouleurMessage.textContent = "Le champ 'couleur' ne peut contenir que des lettres et des espaces";
            errorCouleurMessage.style.visibility = "visible"; // Show error message when validation fails
            validCouleurMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorCouleurMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validCouleurMessage.textContent = "Couleur valide";
            validCouleurMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Couleur only when the form is submitted
        if (!displayCouleurError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Couleur
    errorCouleurMessage.style.visibility = "hidden";

    ///////////////////////
    const typeInput = document.getElementById("type");
    const errorTypeMessage = document.getElementById("error-type");
    const validTypeMessage = document.getElementById("valid-type");

    function validateType() {
        const typeValue = typeInput.value.trim();
        return typeValue !== "" && /^[a-zA-Z\s]*$/.test(typeValue);
    }

    function displayTypeError() {
        const typeValue = typeInput.value.trim();
        if (typeValue === "") {
            errorTypeMessage.textContent = "Veuillez remplir le champ 'type'";
            errorTypeMessage.style.visibility = "visible"; // Show error message for empty field
            validTypeMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateType()) {
            errorTypeMessage.textContent = "Le champ 'type' ne peut contenir que des lettres et des espaces";
            errorTypeMessage.style.visibility = "visible"; // Show error message when validation fails
            validTypeMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorTypeMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validTypeMessage.textContent = "Type valide";
            validTypeMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Type only when the form is submitted
        if (!displayTypeError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Type
    errorTypeMessage.style.visibility = "hidden";

    ///////////////////////
    const disponibiliteInput = document.getElementById("disponibilite");
    const errorDisponibiliteMessage = document.getElementById("error-disponibilite");
    const validDisponibiliteMessage = document.getElementById("valid-disponibilite");

    function validateDisponibilite() {
        const disponibiliteValue = disponibiliteInput.value.trim();
        return disponibiliteValue !== "" && (disponibiliteValue === "true" || disponibiliteValue === "false");
    }

    function displayDisponibiliteError() {
        const disponibiliteValue = disponibiliteInput.value.trim();
        if (disponibiliteValue === "") {
            errorDisponibiliteMessage.textContent = "Veuillez remplir le champ 'disponibilité'";
            errorDisponibiliteMessage.style.visibility = "visible"; // Show error message for empty field
            validDisponibiliteMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateDisponibilite()) {
            errorDisponibiliteMessage.textContent = "Le champ 'disponibilité' doit être 'true' ou 'false'";
            errorDisponibiliteMessage.style.visibility = "visible"; // Show error message when validation fails
            validDisponibiliteMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorDisponibiliteMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validDisponibiliteMessage.textContent = "Disponibilité valide";
            validDisponibiliteMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Disponibilite only when the form is submitted
        if (!displayDisponibiliteError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Disponibilite
    errorDisponibiliteMessage.style.visibility = "hidden";

    ///////////////////////
    const imageInput = document.getElementById("image");
    const errorImageMessage = document.getElementById("error-image");
    const validImageMessage = document.getElementById("valid-image");

    function validateImage() {
        const imageValue = imageInput.value.trim();
        return imageValue !== "";
    }

    function displayImageError() {
        const imageValue = imageInput.value.trim();
        if (imageValue === "") {
            errorImageMessage.textContent = "Veuillez sélectionner une image";
            errorImageMessage.style.visibility = "visible"; // Show error message for empty field
            validImageMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorImageMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validImageMessage.textContent = "Image sélectionnée";
            validImageMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        // Validate Image only when the form is submitted
        if (!displayImageError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Image
    errorImageMessage.style.visibility = "hidden";
});
