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


$idOffre = isset($_POST['idOffre']) ? $_POST['idOffre'] : null;

// function populateidChambreOptions() {
//     try {
//         // Establish connection
//         $conn = config::getConnexion();
//         // Prepare SQL statement to fetch hotel names
//         $stmt = $conn->prepare("SELECT idChambre FROM chambres");
//         $stmt->execute();
//         // Fetch hotel names
//         $chambres = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         // Loop through hotels and output as options
//         foreach ($chambres as $chambre) {
//             echo '<option value="' . $chambre['idChambre'] . '">' . $chambre['idChambre'] . '</option>';
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }


    ?>

 
 
  
<!-- Formulaire de modification -->
<div id="editFormOffre" style="display:none; position: fixed; top: 50%; left: 85%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="margin-bottom: 20px; color: #2a2185;">Modifier l'offre</h2>
    <form id="offreForm" onsubmit="return validateFormOffre()" method="post" action="../controller/offres/update_offre.php" >
        <label for="nomHotel">Nom de l'hotel:</label>
        <select id="nomHotelSelection" name="nomHotel" style="margin-bottom: 10px; width: 100%;">
            <?php populateNomHotelOptions(); ?>
        </select><br>
        <label for="descriptionOffre">Description:</label>
        <input type="text" id="descriptionOffre" name="descriptionOffre" style="margin-bottom: 10px; width: 100%;"><br>
        <!-- <label for="prixOffre">Prix:</label>
        <input type="number" id="prixOffre" name="prixOffre" style="margin-bottom: 10px; width: 100%;"><br> -->
        
                           <!-- <label for="id chambre">id de la chambre:</label>
                          
                                <select id="idChambre" name="idChambre">
                                    <?php// populateidChambreOptions(); ?>
                                </select><br>
                            -->
                    
        <label for="lienOffre1">Lien Offre 1:</label>
        <input type="text" id="lienOffre1" name="lienOffre1" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienOffre2">Lien Offre 2:</label>
        <input type="text" id="lienOffre2" name="lienOffre2" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienOffre3">Lien Offre 3:</label>
        <input type="text" id="lienOffre3" name="lienOffre3" style="margin-bottom: 10px; width: 100%;"><br>
        <input type="hidden" id="idOffreInput" name="idOffre" value="">
        <input type="submit" value="Modifier" style="padding: 10px 20px; background-color: var(--blue); color: var(--white); border: none; border-radius: 6px; cursor: pointer;">
    </form>
</div>

<script>
function validateFormOffre() {
    if (!confirm("Are you sure you want to modify this offer?")) {
        return false; // Return false if the user cancels the modification
    }
    var descriptionOffre = document.getElementById("descriptionOffre").value.trim();
    var lienOffre1 = document.getElementById("lienOffre1").value.trim();
    var lienOffre2 = document.getElementById("lienOffre2").value.trim();
    var lienOffre3 = document.getElementById("lienOffre3").value.trim();


    //var prixOffre = document.getElementById("prixOffre").value.trim();
    // Check if required fields are empty
    if (descriptionOffre === "" || lienOffre1 === ""|| lienOffre2 === ""|| lienOffre3 === "") {
        alert("Description et photos obligatoires.");
        return false;
    }
    var lienPhotoHotelRegex = /^https?:\/\/.*\.(jpg|jpeg)$/i;
            if (!lienOffre1Regex.test(lienOffre1)) {
                alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
                return false;
            }
            var lienPhotoHotelRegex = /^https?:\/\/.*\.(jpg|jpeg)$/i;
            if (!lienOffre2Regex.test(lienOffre2)) {
                alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
                return false;
            }
            var lienPhotoHotelRegex = /^https?:\/\/.*\.(jpg|jpeg)$/i;
            if (!lienOffre3Regex.test(lienOffre3)) {
                alert("Le lien de la photo doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
                return false;
            }

    //alert("Formulaire soumis avec succès!");
    return true;
}


function getOffreInfo(idOffre) {
    var offres = <?php echo json_encode($offres); ?>; // Retrieve offres data from PHP
    console.log("Offres data:", offres); // Log the retrieved data
    for (var i = 0; i < offres.length; i++) {
        if (offres[i].idOffre == idOffre) { // Use loose comparison to handle potential data type differences
            console.log("Matching offre found:", offres[i]);
            return offres[i];
        }
    }
    console.error("Error: No matching offre found for idOffre: " + idOffre);
    return null; // Return null if offre not found
}



function showEditFormOffre(idOffre) {

   
    var modificationForm = document.getElementById('editFormOffre');

    var offre = getOffreInfo(idOffre);
    modificationForm.style.display = 'block'; // Show the modification form
    document.getElementById('idOffreInput').value = idOffre; // Set the value of the hidden input field

    if (offre) {
              //  document.getElementById("prixOffre").value = offre.prixOffre;
                document.getElementById("descriptionOffre").value = offre.descriptionOffre;
                document.getElementById("lienOffre1").value = offre.lienOffre1; 
                document.getElementById("lienOffre2").value = offre.lienOffre2; 
                document.getElementById("lienOffre3").value = offre.lienOffre3; 

    ///////////////////////////////////////////////////////////////////
var nomHotelValue =offre.nomHotel;
var nomHotelSelect = document.getElementById("nomHotelSelection");
        
    for (var i = 0; i < nomHotelSelect.options.length; i++) 
    {
        if (nomHotelSelect.options[i].value === nomHotelValue) {
            nomHotelSelect.options[i].selected = true;
            break;
        }
    }
    ///////////////////////////////////////////////////////////////////////
                } else {
                    alert("Failed to retrieve offre information. Please check console for details.");
                }
            

}
</script>
