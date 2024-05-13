document.addEventListener("DOMContentLoaded", function() {
    const nomActivityInput = document.getElementById("nom_activity");
    const errorNomActivityMessage = document.getElementById("error-nom-activity");
    const validNomActivityMessage = document.getElementById("valid-nom-activity");
    
    function validateNomActivity() {
        const nomActivityValue = nomActivityInput.value.trim();
        return nomActivityValue !== "" && /^[a-zA-Z\s]*$/.test(nomActivityValue);
    }
    
    function displayNomActivityError() {
        const nomActivityValue = nomActivityInput.value.trim();
        if (nomActivityValue === "") {
            errorNomActivityMessage.textContent = "Veuillez remplir le champ 'nom_activity'";
            errorNomActivityMessage.style.visibility = "visible"; // Show error message for empty field
            validNomActivityMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateNomActivity()) {
            errorNomActivityMessage.textContent = "Le champ 'nom_activity' ne peut contenir que des lettres et des espaces";
            errorNomActivityMessage.style.visibility = "visible"; // Show error message when validation fails
            validNomActivityMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorNomActivityMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validNomActivityMessage.textContent = "Nom activité valide";
            validNomActivityMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }
    
    // Add event listener to validate Nom Activity as the user types
    nomActivityInput.addEventListener("input", displayNomActivityError);

    const form = document.getElementById("activityForm");

    form.addEventListener("submit", function(event) {
        // Validate Nom Activity only when the form is submitted
        if (!displayNomActivityError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Nom Activity
    errorNomActivityMessage.style.visibility = "hidden";
});

///////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("activityForm");
    const descriptionInput = document.getElementById("description");
    const errorDescriptionMessage = document.getElementById("error-description");
    const validDescriptionMessage = document.getElementById("valid-description");

    function validateDescription() {
        const descriptionValue = descriptionInput.value.trim();
        return descriptionValue !== "" && !/^\d+$/.test(descriptionValue);
    }
    
    
    function displayDescriptionError() {
        const descriptionValue = descriptionInput.value.trim();
        if (!validateDescription()) {
            if (descriptionValue === "") {
                errorDescriptionMessage.textContent = "Veuillez remplir le champ 'description'";
            } else {
                errorDescriptionMessage.textContent = "Le champ 'description' ne peut pas contenir uniquement des chiffres";
            }
            errorDescriptionMessage.style.visibility = "visible";
            validDescriptionMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorDescriptionMessage.style.visibility = "hidden";
            validDescriptionMessage.textContent = "Description valide";
            validDescriptionMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }
    
    form.addEventListener("submit", function(event) {
        if (!displayDescriptionError()) {
            event.preventDefault();
        }
    });

    // Add event listener to validate Description when input changes
    descriptionInput.addEventListener("input", displayDescriptionError);
});

//////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("activityForm");
    const lieuInput = document.getElementById("lieu");
    const errorLieuMessage = document.getElementById("error-lieu");
    const validLieuMessage = document.getElementById("valid-lieu");

    function validateLieu() {
        const lieuValue = lieuInput.value.trim();
        return lieuValue !== "";
    }

    function displayLieuError() {
        const lieuValue = lieuInput.value.trim();
        if (!validateLieu()) {
            errorLieuMessage.textContent = "Veuillez remplir le champ 'lieu'";
            errorLieuMessage.style.visibility = "visible";
            validLieuMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorLieuMessage.style.visibility = "hidden";
            validLieuMessage.textContent = "Lieu valide";
            validLieuMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        if (!displayLieuError()) {
            event.preventDefault();
        }
    });

    // Add event listener to validate Lieu when input changes
    lieuInput.addEventListener("input", displayLieuError);
});
///////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("activityForm");
    const prixInput = document.getElementById("prix");
    const errorPrixMessage = document.getElementById("error-prix");
    const validPrixMessage = document.getElementById("valid-prix");

    function validatePrix() {
        const prixValue = prixInput.value.trim();
        return prixValue !== "" && /^\d+$/.test(prixValue);
    }

    function displayPrixError() {
        const prixValue = prixInput.value.trim();
        if (!validatePrix()) {
            if (prixValue === "") {
                errorPrixMessage.textContent = "Veuillez remplir le champ 'prix'";
            } else {
                errorPrixMessage.textContent = "Le champ 'prix' ne peut contenir que des chiffres";
            }
            errorPrixMessage.style.visibility = "visible";
            validPrixMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorPrixMessage.style.visibility = "hidden";
            validPrixMessage.textContent = "Prix valide";
            validPrixMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        if (!displayPrixError()) {
            event.preventDefault();
        }
    });

    // Add event listener to validate Prix when input changes
    prixInput.addEventListener("input", displayPrixError);
});
//////////////////////////////////////////
/*document.addEventListener("DOMContentLoaded", function() {
    const prixInput = document.getElementById("prix");

    prixInput.addEventListener("blur", function() {
        const prixValue = prixInput.value.trim();
        if (prixValue !== "") {
            prixInput.value = prixValue + " DT";
        }
    });
});*/
/////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("activityForm");
    const dateInput = document.getElementById("date");
    const errorDateMessage = document.getElementById("error-date");
    const validDateMessage = document.getElementById("valid-date");

    function validateDate() {
        const dateValue = dateInput.value.trim();
        return dateValue !== "";
    }

    function displayDateError() {
        const dateValue = dateInput.value.trim();
        const currentDate = new Date();
        const selectedDate = new Date(dateValue);
    
        if (!validateDate()) {
            errorDateMessage.textContent = "Veuillez remplir le champ 'date'";
            errorDateMessage.style.visibility = "visible";
            errorDateMessage.style.color = "red"; // Reset color
            validDateMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (selectedDate < currentDate) {
            errorDateMessage.textContent = "La date ne peut pas être dans le passé";
            errorDateMessage.style.visibility = "visible";
            errorDateMessage.style.color = "red"; // Set color to red for error message
            validDateMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorDateMessage.textContent = ""; // Clear error message when input is valid
            errorDateMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validDateMessage.textContent = "Date valide";
            validDateMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }
    

    form.addEventListener("submit", function(event) {
        if (!displayDateError()) {
            event.preventDefault();
        }
    });

    // Add event listener to validate Date when input changes
    dateInput.addEventListener("input", displayDateError);
});
////////////////////////////////:
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("activityForm");
    const idCategoryInput = document.getElementById("id_category");
    const errorIdCategoryMessage = document.getElementById("error-id-category");
    const validIdCategoryMessage = document.getElementById("valid-id-category");

    function validateIdCategory() {
        const idCategoryValue = idCategoryInput.value.trim();
        return idCategoryValue !== "" && /^\d+$/.test(idCategoryValue);
    }

    function displayIdCategoryError() {
        const idCategoryValue = idCategoryInput.value.trim();
        if (!validateIdCategory()) {
            if (idCategoryValue === "") {
                errorIdCategoryMessage.textContent = "Veuillez remplir le champ 'id_category'";
            } else {
                errorIdCategoryMessage.textContent = "Le champ 'id_category' ne peut contenir que des chiffres";
            }
            errorIdCategoryMessage.style.visibility = "visible";
            validIdCategoryMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorIdCategoryMessage.style.visibility = "hidden";
            validIdCategoryMessage.textContent = "ID Category valide";
            validIdCategoryMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    form.addEventListener("submit", function(event) {
        if (!displayIdCategoryError()) {
            event.preventDefault();
        }
    });

    // Add event listener to validate ID Category when input changes
    idCategoryInput.addEventListener("input", displayIdCategoryError);
});
///////////////////////////////////////////////////////////////


///////////////////////
// Add validation for capacity_max
document.addEventListener("DOMContentLoaded", function() {
    const capacityMaxInput = document.getElementById("capacity_max");
    const errorCapacityMaxMessage = document.getElementById("error-capacity-max");
    const validCapacityMaxMessage = document.getElementById("valid-capacity-max");

    function validateCapacityMax() {
        const capacityMaxValue = capacityMaxInput.value.trim();
        return capacityMaxValue !== "" && /^\d+$/.test(capacityMaxValue) && parseInt(capacityMaxValue) <= 1000;
    }

    function displayCapacityMaxError() {
        const capacityMaxValue = capacityMaxInput.value.trim();
        if (capacityMaxValue === "") {
            errorCapacityMaxMessage.textContent = "Veuillez remplir le champ 'capacité maximale'";
            errorCapacityMaxMessage.style.visibility = "visible"; // Show error message for empty field
            validCapacityMaxMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else if (!validateCapacityMax()) {
            if (!/^\d+$/.test(capacityMaxValue)) {
                errorCapacityMaxMessage.textContent = "Le champ 'capacité maximale' ne peut contenir que des chiffres";
            } else if (parseInt(capacityMaxValue) > 1000) {
                errorCapacityMaxMessage.textContent = "La capacité maximale ne peut pas dépasser 1000";
            }
            errorCapacityMaxMessage.style.visibility = "visible"; // Show error message when validation fails
            validCapacityMaxMessage.style.visibility = "hidden"; // Hide valid message
            return false;
        } else {
            errorCapacityMaxMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validCapacityMaxMessage.textContent = "Capacité maximale valide";
            validCapacityMaxMessage.style.visibility = "visible"; // Show valid message
            return true;
        }
    }

    // Add event listener to validate Capacity Max when input changes
    capacityMaxInput.addEventListener("input", displayCapacityMaxError);

    const form = document.getElementById("activityForm");

    form.addEventListener("submit", function(event) {
        // Validate Capacity Max only when the form is submitted
        if (!displayCapacityMaxError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Capacity Max
    errorCapacityMaxMessage.style.visibility = "hidden";
});

////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const durationInput = document.getElementById("duration");
    const errorDurationMessage = document.getElementById("error-duration");

    function displayDurationError() {
        const durationValue = durationInput.value.trim();
        if (durationValue === "") {
            errorDurationMessage.textContent = "Veuillez remplir le champ 'durée'";
            errorDurationMessage.style.visibility = "visible"; // Show error message for empty field
            return false;
        } else {
            errorDurationMessage.style.visibility = "hidden"; // Hide error message when input is valid
            return true;
        }
    }

    // Add event listener to validate Duration when input changes
    durationInput.addEventListener("change", displayDurationError);

    const form = document.getElementById("activityForm");

    form.addEventListener("submit", function(event) {
        // Validate Duration only when the form is submitted
        if (!displayDurationError()) {
            event.preventDefault();
        }
    });

    // Initially hide the error message for Duration
    errorDurationMessage.style.visibility = "hidden";
});
////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const dateDebutInput = document.getElementById("date_debut");
    const errorDateDebutMessage = document.getElementById("error-date-debut");
    const validDateDebutMessage = document.getElementById("valid-date-debut");

    const dateFinInput = document.getElementById("date_fin");
    const errorDateFinMessage = document.getElementById("error-date-fin");
    const validDateFinMessage = document.getElementById("valid-date-fin");

    function displayDateDebutError() {
        const dateDebutValue = dateDebutInput.value.trim();
        if (dateDebutValue === "") {
            errorDateDebutMessage.textContent = "Veuillez sélectionner une heure de début";
            errorDateDebutMessage.style.visibility = "hidden"; // Hide error message initially
            validDateDebutMessage.style.visibility = "hidden"; // Hide valid message initially
            return false;

           
        } else {
            errorDateDebutMessage.textContent = ""; // Clear error message when input is valid
            errorDateDebutMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validDateDebutMessage.textContent = "Heure de début sélectionnée";
            errorDateMessage.style.color = "green";
            validDateDebutMessage.style.visibility = "visible"; // Hide valid message initially
            return true;
        }
        
    }

    function displayDateFinError() {
        const dateFinValue = dateFinInput.value.trim();
        if (dateFinValue === "") {
            errorDateFinMessage.textContent = "Veuillez sélectionner une heure de fin";
            errorDateFinMessage.style.visibility = "hidden"; // Hide error message initially
            validDateFinMessage.style.visibility = "hidden"; // Hide valid message initially
            return false;
        } else {
            errorDateFinMessage.textContent = ""; // Clear error message when input is valid
            errorDateFinMessage.style.visibility = "hidden"; // Hide error message when input is valid
            validDateFinMessage.textContent = "Heure de fin sélectionnée";
            validDateFinMessage.style.visibility = "hidden"; // Hide valid message initially
            return true;
        }
    }

    const form = document.getElementById("activityForm");

    form.addEventListener("submit", function(event) {
        // Afficher les messages d'erreur uniquement lors de la soumission du formulaire
        displayDateDebutError();
        displayDateFinError();
        if (!displayDateDebutError() || !displayDateFinError()) {
            errorDateDebutMessage.style.visibility = "visible"; // Show error message for date début
            errorDateFinMessage.style.visibility = "visible"; // Show error message for date fin
            event.preventDefault();
        }
    });
});
