<!-- Formulaire de modification -->
<div id="editForm" style="display:none; position: fixed; top: 50%; left: 85%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="margin-bottom: 20px; color: #2a2185;">Modifier l'hôtel</h2>
    <form id="hotelForm" onsubmit="return validateForm()" method="post" action="../controller/update_hotel.php" >
        <input type="hidden" id="nomHotel" name="nomHotel">
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="etoiles">Nombre d'étoiles:</label>
        <input type="number" id="etoiles" name="etoiles" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="lienPhotoHotel">Lien de la photo:</label>
        <input type="text" id="lienPhotoHotel" name="lienPhotoHotel" style="margin-bottom: 10px; width: 100%;"><br>
        <label for="infoContact">Info contact:</label>
        <input type="text" id="infoContact" name="infoContact" style="margin-bottom: 10px; width: 100%;"><br>
        <input type="submit" value="Modifier" style="padding: 10px 20px; background-color: var(--blue); color: var(--white); border: none; border-radius: 6px; cursor: pointer;">
    </form>
</div>

<script>
function validateForm() {
    var nomHotel = document.getElementById("nomHotel").value.trim();
    var adresse = document.getElementById("adresse").value.trim();
    var description = document.getElementById("description").value.trim();
    var etoiles = document.getElementById("etoiles").value.trim();
    var lienPhotoHotel = document.getElementById("lienPhotoHotel").value.trim();
    var infoContact = document.getElementById("infoContact").value.trim();

    if (
        nomHotel === "" || 
        adresse === "" || 
        description === "" || 
        etoiles === "" || 
        lienPhotoHotel === "" || 
        infoContact === ""
    ) {
        alert("Tous les champs sont obligatoires.");
        return false; 
    }

    if (!/^[\w\s]+$/.test(nomHotel)) {
        alert("Le nom de l'hôtel ne peut contenir que des lettres, des chiffres et des espaces.");
        return false;
    }

    if (isNaN(etoiles) || etoiles < 1 || etoiles > 5) {
        alert("Le nombre d'étoiles doit être un nombre entre 1 et 5.");
        return false;
    }

    if (!/^https?:\/\/.*\.(jpg|jpeg)$/i.test(lienPhotoHotel)) {
        alert("Le lien de la photo de l'hôtel doit commencer par 'http://' ou 'https://' et se terminer par '.jpg' ou '.jpeg'.");
        return false;
    }

    if (!/^\d{8}$/.test(infoContact)) {
        alert("Les informations de contact doivent contenir exactement 8 chiffres.");
        return false;
    }

    return true; 
}
</script>




<script>
function getHotelInfo(nomHotel) {
    var hotels = <?php echo json_encode($hotels); ?>; // Retrieve hotels data from PHP
    for (var i = 0; i < hotels.length; i++) {
        if (hotels[i].nomHotel === nomHotel) {
            return hotels[i];
        }
    }
    return null; // Return null if hotel not found
}

    function showEditForm(nomHotel) {
    console.log(nomHotel);
    var hotel = getHotelInfo(nomHotel);
  
    if (hotel) {
        document.getElementById("nomHotel").value = nomHotel;
        document.getElementById("adresse").value = hotel.adresse;
        document.getElementById("description").value = hotel.description;
        document.getElementById("etoiles").value = hotel.etoiles;
        document.getElementById("lienPhotoHotel").value = hotel.lienPhotoHotel; 
        document.getElementById("infoContact").value = hotel.infoContact;

        document.getElementById("editForm").style.display = "block"; 
    } else {
        alert("Failed to retrieve hotel information. Please check console for details.");
    }
}
</script>