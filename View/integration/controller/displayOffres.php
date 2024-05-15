
<?php

include('integration/controller/phpqrcode/qrlib.php'); // etape 1

function displayLogo($logoLink) {
    return '<img class="logo" style="width:20px;height:20px;" src="' . $logoLink  . '">';
}
function generateQRCode($text, $filename)
{
    QRcode::png($text, $filename);
}

// include '../config.php';

$conn = config::getConnexion(); // Establish the connection

try {
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'none';
    switch ($sort) {
        case 'name':
            $orderBy = 'ORDER BY nomHotel ASC';
            break;
        case 'price':
            $orderBy = 'ORDER BY chambres.prixChambre ASC';
            break;
        default:
            $orderBy = ''; // No sorting
            break;
    }

    $orderByClause = $orderBy ? $orderBy : "";

    $query = $conn->query("SELECT offres.idOffre, offres.nomHotel, hotels.lienPhotoHotel, hotels.adresse, offres.descriptionOffre, chambres.typeChambre, chambres.prixChambre
                            FROM offres
                            LEFT JOIN hotels ON offres.nomHotel = hotels.nomHotel
                            LEFT JOIN chambres ON hotels.nomHotel = chambres.nomHotel
                            $orderByClause");

    $offers = $query->fetchAll();


    if (count($offers) > 0) {
        foreach ($offers as $offer) {


            $qrCodeFilename = 'temp_qr_code_' . $offer['idOffre'] . '.png';
            $lien = 'https://xplore1.000webhostapp.com/controller/readMore.php?hotel=' . urlencode($offer['nomHotel']);

            generateQRCode($lien, $qrCodeFilename);




        echo '<div class="hotel">';
        echo '<h2 class="text-center hotel-name">' . $offer['nomHotel'] . '</h2>'; // font big

            echo '<img class="img-fluid" src="' . $offer['lienPhotoHotel'] . '" alt="Photo de l\'hôtel">';

            echo '<p class="text-center">' . $offer['adresse'] . ' - Chambre: ' . $offer['typeChambre']  . '</p>';

            // Display star rating
            echo '<div class="mb-3 text-center">';
            
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '<small class="fa fa-star text-primary"></small>';
            echo '</div>';


            echo '<p class="text-center hotel-price hidden">Price: ' . $offer['prixChambre'] . '</p>';


            // Display description
            echo '<p class="text-center">' . $offer['descriptionOffre'] . '</p>';

            echo '<div class="d-flex justify-content-center mb-2">';
            
            echo '<a href="integration/controller/readMore.php?hotel=' . urlencode($offer['nomHotel']) . '" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>';
            echo '<a href="integration/controller/payment_form.php?hotel=' . urlencode($offer['nomHotel']) . '" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>';
           
            echo '</div>';


            //like dislike buttons 5orm
            $formId = 'likeDislikeForm_' . $offer['idOffre'];

            echo '<form id="' . $formId . '" method="post" target="hidden_iframe" action="integration/controller/likeDislike.php">';
            echo '<input type="hidden" name="offer_id" value="' . $offer['idOffre'] . '">';
            echo '<input type="hidden" name="reaction" id="reactionInput_' . $offer['idOffre'] . '" value="">'; // Unique hidden input for reaction
            
            echo '<button type="button" class="btn btn-sm btn-primary px-2" style="border-radius: 30px; padding: 5px;" onclick="likeDislike(\'like\', ' . $offer['idOffre'] . ')">';
            echo '<img src="integration/view/assets/assetsFront/img/like.png" alt="Like" style="width: 20px; height: 20px;">';
            echo '</button>';
            
            echo '<button type="button" class="btn btn-sm btn-primary px-2" style="border-radius: 30px; padding: 5px;" onclick="likeDislike(\'dislike\', ' . $offer['idOffre'] . ')">';
            echo '<img src="integration/view/assets/assetsFront/img/dislike.png" alt="Dislike" style="width: 20px; height: 20px;">';
            echo '</button>';
            echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            
                        echo '<img src="' . $qrCodeFilename . '" alt="QR Code"  style="width: 90px; height: 90px; ">'; 
                        echo '</form>';
            
            
            echo '</div>';

        }
    }
    else {
        echo 'Aucune offre trouvée.';
    }
} catch (PDOException $e) {
    echo 'Echec de connexion:' . $e->getMessage();
}

?>
<!-- ///////////////////////likes -->
<script>
    function likeDislike(reaction, offerId) {
        var reactionInputId = 'reactionInput_' + offerId;
        document.getElementById(reactionInputId).value = reaction;
        document.getElementById('likeDislikeForm_' + offerId).submit();
    }
</script>

<!-- ///////////////////recherche /tri -->
<script>
    const searchInputOffre = document.getElementById('searchInputOffre');

    searchInputOffre.addEventListener('input', function(event) {
        const searchQuery = event.target.value.trim();
        console.log('Search query:', searchQuery);

        // Call the function to perform AJAX search
        searchOffres(searchQuery);
    });

    function searchOffres(searchQuery) {
    const url = 'integration/controller/searchFront.php?search=' + encodeURIComponent(searchQuery);
    console.log('Fetching URL:', url);

    // Perform AJAX call to the PHP script
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Handle the response data (e.g., update the UI)
            console.log('Search results:', data);
            // Implement logic to update UI with search results
        })
        .catch(error => console.error('Error:', error));
}



      document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to the sort select element
        var sortSelect = document.getElementById('sortSelect');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                console.log('Selection changed:', sortSelect.value); // Log the selected value
                // Call the sorting function when the selection changes
                console.log('Value before sortOffers:', sortSelect.value);

                sortOffers();
            });
        }
    });

    
    function sortOffers() {
        var sortSelect = document.getElementById('sortSelect');
        if (!sortSelect) {
            console.error('Sort select element not found.');
            return;
        }

        var selectedSort = sortSelect.value;

        var hotelOffersContainer = document.getElementById('hotelOffers');
        if (!hotelOffersContainer) {
            console.error('Hotel offers container not found.');
            return;
        }

        var hotelOffers = hotelOffersContainer.getElementsByClassName('hotel');
        if (!hotelOffers || hotelOffers.length === 0) {
            console.error('Hotel offers not found or empty.');
            return;
        }

        var sortedOffers = Array.from(hotelOffers);

        switch (selectedSort) {
            case 'name':
                sortedOffers.sort(function(a, b) {
                    var nameA = a.querySelector('.hotel-name').innerText.toUpperCase();
                    var nameB = b.querySelector('.hotel-name').innerText.toUpperCase();
                    return nameA.localeCompare(nameB);
                });
                break;
            case 'price':
                sortedOffers.sort(function(a, b) {
                    var priceA = parseFloat(a.querySelector('.hotel-price').innerText.replace(/\D/g, ''));
                    var priceB = parseFloat(b.querySelector('.hotel-price').innerText.replace(/\D/g, ''));
                    return priceA - priceB;
                });
                break;
            default:
                // No sorting (reset to default order)
                sortedOffers = Array.from(hotelOffers);
                break;
        }

        // Clear existing offers in container
        while (hotelOffersContainer.firstChild) {
            hotelOffersContainer.removeChild(hotelOffersContainer.firstChild);
        }

        // Append sorted offers to container
        sortedOffers.forEach(function(offer) {
            hotelOffersContainer.appendChild(offer);
        });
    }
</script>

