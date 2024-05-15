document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("category-form");
    const idCategoryInput = document.getElementById("id_category");
    const categoryNameInput = document.getElementById("nom_category");
    const levelInputs = document.querySelectorAll("input[name='level']");
    const seasonSelect = document.getElementById("season");
    const popularityInputs = document.querySelectorAll("input[name='popularity']");
    const mobilityInputs = document.querySelectorAll("input[name='mobility']");
    const idErrorMessage = document.getElementById("error-id-category");
    const nameErrorMessage = document.getElementById("error-nom-category");
    const errorLevelMessage = document.getElementById("error-level");
    const errorSeasonMessage = document.getElementById("error-season");
    const errorPopularityMessage = document.getElementById("error-popularity");
    const errorMobilityMessage = document.getElementById("error-mobility");

    // Function to validate category ID
    function validateCategoryId() {
        const idCategoryValue = idCategoryInput.value.trim();
        if (idCategoryValue === "") {
            idErrorMessage.textContent = "Category ID cannot be empty";
            idErrorMessage.style.visibility = "visible";
        } else if (!/^\d{8}$/.test(idCategoryValue)) {
            idErrorMessage.textContent = "Category ID must be exactly 8 digits";
            idErrorMessage.style.visibility = "visible";
        } else {
            idErrorMessage.textContent = "Category ID validée";
            idErrorMessage.style.color = "green";
            idErrorMessage.style.visibility = "visible";
        }
    }

    // Function to validate category name
    function validateCategoryName() {
        const categoryNameValue = categoryNameInput.value.trim();
        if (categoryNameValue === "") {
            nameErrorMessage.textContent = "Category name cannot be empty";
            nameErrorMessage.style.color = "red";
            nameErrorMessage.style.visibility = "visible";
        } else if (!isNaN(categoryNameValue)) {
            nameErrorMessage.textContent = "No numbers allowed in the category name";
            nameErrorMessage.style.color = "red";
            nameErrorMessage.style.visibility = "visible";
        } else {
            nameErrorMessage.textContent = "Category name validée";
            nameErrorMessage.style.color = "green";
            nameErrorMessage.style.visibility = "visible";
        }
    }

    // Listen for input event on category ID input field
    idCategoryInput.addEventListener("input", validateCategoryId);
    
    // Listen for input event on category name input field
    categoryNameInput.addEventListener("input", validateCategoryName);

    // Listen for form submission
    form.addEventListener("submit", function(event) {
        // Reset all error messages
        idErrorMessage.textContent = "";
        idErrorMessage.style.visibility = "hidden";
        nameErrorMessage.textContent = "";
        nameErrorMessage.style.visibility = "hidden";
        errorLevelMessage.textContent = "";
        errorLevelMessage.style.visibility = "hidden";
        errorSeasonMessage.textContent = "";
        errorSeasonMessage.style.visibility = "hidden";
        errorPopularityMessage.textContent = "";
        errorPopularityMessage.style.visibility = "hidden";
        errorMobilityMessage.textContent = "";
        errorMobilityMessage.style.visibility = "hidden";

        // Validate Category ID
        validateCategoryId();

        // Validate Category Name
        validateCategoryName();

        // Validate Level
        let levelSelected = false;
        levelInputs.forEach(input => {
            if (input.checked) {
                levelSelected = true;
            }
        });
        if (!levelSelected) {
            errorLevelMessage.textContent = "Please select a level";
            errorLevelMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }

        // Validate Season
        if (seasonSelect.value === "") {
            errorSeasonMessage.textContent = "Please select a season";
            errorSeasonMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }

        // Validate Popularity
        let popularitySelected = false;
        popularityInputs.forEach(input => {
            if (input.checked) {
                popularitySelected = true;
            }
        });
        if (!popularitySelected) {
            errorPopularityMessage.textContent = "Please select popularity";
            errorPopularityMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }

        // Validate Mobility
        let mobilitySelected = false;
        mobilityInputs.forEach(input => {
            if (input.checked) {
                mobilitySelected = true;
            }
        });
        if (!mobilitySelected) {
            errorMobilityMessage.textContent = "Please select mobility";
            errorMobilityMessage.style.visibility = "visible";
            event.preventDefault(); // Prevent form submission
        }
    });
});
