
<?php
    // Function to fetch hotel names from the database
    function populateNomHotelOptions() {
        try {
            // Establish connection
            $conn = config::getConnexion();
            // Prepare SQL statement to fetch hotel names
            $stmt = $conn->prepare("SELECT nomHotel FROM hotels");
            $stmt->execute();
            // Fetch hotel names
            $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Loop through hotels and output as options
            foreach ($hotels as $hotel) {
                echo '<option value="' . $hotel['nomHotel'] . '">' . $hotel['nomHotel'] . '</option>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

<!-- Formulaire de modification -->
<div id="editFormOffre" style="display:none; position: fixed; top: 50%; left: 85%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="margin-bottom: 20px; color: #2a2185;">Modifier l'offre</h2>
    <form id="offreForm" onsubmit="return validateForm()" method="post" action="update_offre.php" >
        <label for="nomHotel">Nom de l'hotel:</label>
        <select id="nomHotel" name="nomHotel" style="margin-bottom: 10px; width: 100%;">
            <?php populateNomHotelOptions(); ?>
        </select><br>
        <label for="descriptionOffre">Description:</label>
        <input type="text" id="descriptionOffre" name="descriptionOffre" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="prixOffre">Prix:</label>
        <input type="number" id="prixOffre" name="prixOffre" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienOffre1">Lien Offre 1:</label>
        <input type="text" id="lienOffre1" name="lienOffre1" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienOffre2">Lien Offre 2:</label>
        <input type="text" id="lienOffre2" name="lienOffre2" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienOffre3">Lien Offre 3:</label>
        <input type="text" id="lienOffre3" name="lienOffre3" style="margin-bottom: 10px; width: 100%;"><br>
        <input type="submit" value="Modifier" style="padding: 10px 20px; background-color: var(--blue); color: var(--white); border: none; border-radius: 6px; cursor: pointer;">
    </form>
</div>

<script>
function validateForm() {
    var descriptionOffre = document.getElementById("descriptionOffre").value.trim();
    var prixOffre = document.getElementById("prixOffre").value.trim();
    // Check if required fields are empty
    if (descriptionOffre === "" || prixOffre === "") {
        alert("Description et Prix sont obligatoires.");
        return false;
    }
    // Check if prixOffre is a positive number
    if (isNaN(prixOffre) || parseFloat(prixOffre) <= 0) {
        alert("Le prix de l'offre doit être un nombre positif.");
        return false;
    }
    // Success message
    alert("Formulaire soumis avec succès!");
    return true;
}
</script>




<script>
function getOffreInfo(idOffre) {
    var offres = <?php echo json_encode($offres); ?>; // Retrieve hotels data from PHP
    for (var i = 0; i < offres.length; i++) {
        if (offre[i].idOffre === idOffre) {
            return offres[i];
        }
    }
    return null; // Return null if hotel not found
}

    function showEditForm(idfOffre) {
    console.log(idOffre);
    var offre = getOffreInfo(idOffre);
  
    if (offre) {
        document.getElementById("nomHotel").value = offre.nomHotel;
        document.getElementById("prixOffre").value = offre.prixOffre;
        document.getElementById("descriptionOffre").value = offre.descriptionOffre;
        document.getElementById("lienOffre1").value = offre.lienOffre1; 
        document.getElementById("lienOffre2").value = offre.lienOffre2; 
        document.getElementById("lienOffre3").value = offre.lienOffre3; 
        document.getElementById("editForm").style.display = "block"; 
    } else {
        alert("Failed to retrieve offre information. Please check console for details.");
    }
}
</script>