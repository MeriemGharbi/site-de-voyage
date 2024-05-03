document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("reservation-form");
    const idReservationInput = document.getElementById("id_reservation");
    const nomClientInput = document.getElementById("nom_client");
    const idVoitureInput = document.getElementById("id_voiture");
    const dateDebutInput = document.getElementById("date_debut");
    const dateFinInput = document.getElementById("date_fin");
    const prixTotalInput = document.getElementById("prix_total");
    const statutSelect = document.getElementById("statut");
    
    const idErrorMessage = document.getElementById("error-id-reservation");
    const nomClientErrorMessage = document.getElementById("error-nom-client");
    const idVoitureErrorMessage = document.getElementById("error-id-voiture");
    const dateDebutErrorMessage = document.getElementById("error-date-debut");
    const dateFinErrorMessage = document.getElementById("error-date-fin");
    const prixTotalErrorMessage = document.getElementById("error-prix-total");
    const statutErrorMessage = document.getElementById("error-statut");

    // Function to validate reservation ID
    function validateReservationId() {
        const idReservationValue = idReservationInput.value.trim();
        if (idReservationValue === "") {
            idErrorMessage.textContent = "Reservation ID cannot be empty";
            idErrorMessage.style.visibility = "visible";
        } else if (!/^\d{8}$/.test(idReservationValue)) {
            idErrorMessage.textContent = "Reservation ID must be exactly 8 digits";
            idErrorMessage.style.visibility = "visible";
        } else {
            idErrorMessage.textContent = "Reservation ID validated";
            idErrorMessage.style.color = "green";
            idErrorMessage.style.visibility = "visible";
        }
    }

    // Function to validate client name
    function validateClientName() {
        const nomClientValue = nomClientInput.value.trim();
        if (nomClientValue === "") {
            nomClientErrorMessage.textContent = "Client name cannot be empty";
            nomClientErrorMessage.style.color = "red";
            nomClientErrorMessage.style.visibility = "visible";
        } else if (!isNaN(nomClientValue)) {
            nomClientErrorMessage.textContent = "No numbers allowed in the client name";
            nomClientErrorMessage.style.color = "red";
            nomClientErrorMessage.style.visibility = "visible";
        } else {
            nomClientErrorMessage.textContent = "Client name validated";
            nomClientErrorMessage.style.color = "green";
            nomClientErrorMessage.style.visibility = "visible";
        }
    }

    // Function to validate car ID
    function validateCarId() {
        const idVoitureValue = idVoitureInput.value.trim();
        if (idVoitureValue === "") {
            idVoitureErrorMessage.textContent = "Car ID cannot be empty";
            idVoitureErrorMessage.style.color = "red";
            idVoitureErrorMessage.style.visibility = "visible";
        } else if (!/^\d{8}$/.test(idVoitureValue)) {
            idVoitureErrorMessage.textContent = "Car ID must be exactly 8 digits";
            idVoitureErrorMessage.style.color = "red";
            idVoitureErrorMessage.style.visibility = "visible";
        } else {
            idVoitureErrorMessage.textContent = "Car ID validated";
            idVoitureErrorMessage.style.color = "green";
            idVoitureErrorMessage.style.visibility = "visible";
        }
    }

    // Function to validate date range
    function validateDateRange() {
        const dateDebutValue = new Date(dateDebutInput.value);
        const dateFinValue = new Date(dateFinInput.value);
        
        if (dateDebutValue >= dateFinValue) {
            dateDebutErrorMessage.textContent = "Start date must be before end date";
            dateFinErrorMessage.textContent = "End date must be after start date";
            dateDebutErrorMessage.style.color = "red";
            dateFinErrorMessage.style.color = "red";
            dateDebutErrorMessage.style.visibility = "visible";
            dateFinErrorMessage.style.visibility = "visible";
        } else {
            dateDebutErrorMessage.textContent = "";
            dateFinErrorMessage.textContent = "";
            dateDebutErrorMessage.style.visibility = "hidden";
            dateFinErrorMessage.style.visibility = "hidden";
        }
    }

    // Listen for input event on reservation ID input field
    idReservationInput.addEventListener("input", validateReservationId);
    
    // Listen for input event on client name input field
    nomClientInput.addEventListener("input", validateClientName);

    // Listen for input event on car ID input field
    idVoitureInput.addEventListener("input", validateCarId);

    // Listen for input event on date fields
    dateDebutInput.addEventListener("input", validateDateRange);
    dateFinInput.addEventListener("input", validateDateRange);

    // Listen for form submission
    form.addEventListener("submit", function(event) {
        // Reset all error messages
        idErrorMessage.textContent = "";
        idErrorMessage.style.visibility = "hidden";
        nomClientErrorMessage.textContent = "";
        nomClientErrorMessage.style.visibility = "hidden";
        idVoitureErrorMessage.textContent = "";
        idVoitureErrorMessage.style.visibility = "hidden";
        dateDebutErrorMessage.textContent = "";
        dateDebutErrorMessage.style.visibility = "hidden";
        dateFinErrorMessage.textContent = "";
        dateFinErrorMessage.style.visibility = "hidden";
        prixTotalErrorMessage.textContent = "";
        prixTotalErrorMessage.style.visibility = "hidden";
        statutErrorMessage.textContent = "";
        statutErrorMessage.style.visibility = "hidden";

        // Validate Reservation ID
        validateReservationId();

        // Validate Client Name
        validateClientName();

        // Validate Car ID
        validateCarId();

        // Validate Date Range
        validateDateRange();

        // Validate Total Price
        if (prixTotalInput.value.trim() === "") {
            prixTotalErrorMessage.textContent = "Total price cannot be empty";
            prixTotalErrorMessage.style.color = "red";
            prixTotalErrorMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }

        // Validate Status
        if (statutSelect.value === "") {
            statutErrorMessage.textContent = "Please select a status";
            statutErrorMessage.style.color = "red";
            statutErrorMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }
    });
});
