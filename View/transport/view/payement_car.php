


<?php 

require_once '../config.php'; 





$nights = $_POST['nights'];
$today = date('d-m-Y');
$generatedID1 = $_POST['id_reservation'];
$generatedID2 = $_POST['generated_id2'];
$generatedID3 = $_POST['generated_id3'];
$numberOfRooms = $_POST['booking_details'];
$pricePerRoom = $_POST['price'];
$itemPrice = $pricePerRoom * $numberOfRooms * $nights;
$conn = config::getConnexion();
$name = $_POST['nom_client'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$hname = $_POST['hname'];
$checkInDate = $_POST['date_debut']; 
$checkOutDate = $_POST['date_fin']; 
$phoneNumber = $_POST['id_voiture'];
$numberOfGuests = $_POST['statut'];
$reservationMessage = "Reserve for " . strval($numberOfGuests) . " rooms.";

$stmt = $conn->prepare("INSERT INTO bookings (name, email, check_in_date, check_out_date, phone_number, number_of_guests,transaction_id) VALUES (?, ?, ?, ?, ?, ?,?)");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $checkInDate);
$stmt->bindParam(4, $checkOutDate);
$stmt->bindParam(5, $phoneNumber);
$stmt->bindParam(6, $numberOfGuests);
$stmt->bindParam(7, $generatedID3);

$stmt->execute();

$stmt = $conn->prepare("INSERT INTO transactions (item_name, item_price, payer_name, payer_lastname, payer_email,paid_amount,created,payer_id,order_id,transaction_id) 
VALUES ('$hname', '$itemPrice', '$name', '$lname', '$email','$itemPrice',CURRENT_TIMESTAMP(),'$generatedID1','$generatedID2','$generatedID3')");

$stmt->execute();






?>

<?php
/*require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', '', 14);


$pdf->Cell(0, 10, 'Booking Details:', 0, 1);
$pdf->Cell(0, 10, '', 0, 1); 


$pdf->Cell(0, 10, 'Transaction number: ' . $_POST['generated_id3'], 0, 1);
$pdf->Cell(0, 10, 'Number of Rooms: ' . $_POST['booking_details'], 0, 1);
$pdf->Cell(0, 10, 'Price per Room: ' . $_POST['price'], 0, 1);
$pdf->Cell(0, 10, 'Item Price: ' . $itemPrice, 0, 1);
$pdf->Cell(0, 10, 'Client Name: ' . $_POST['name'], 0, 1);
$pdf->Cell(0, 10, 'Last Name: ' . $_POST['lname'], 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $_POST['email'], 0, 1);
$pdf->Cell(0, 10, 'Hotel Name: ' . $_POST['hname'], 0, 1);
$pdf->Cell(0, 10, 'Check-In Date: ' . $_POST['expiry_date'], 0, 1);
$pdf->Cell(0, 10, 'Check-Out Date: ' . $_POST['expiry_date'], 0, 1);
$pdf->Cell(0, 10, 'Phone Number: ' . $_POST['phonenumber'], 0, 1);
$pdf->Cell(0, 10, 'Number of Guests: ' . $_POST['booking_details'], 0, 1);


$pdf->Output('toPDF.pdf', 'D');*/


require 'C:\Users\saifa\Desktop\projet web\xplore-pro-max\xplore\View\assets\PHPMailer\src\PHPMailer.php';
require 'C:\Users\saifa\Desktop\projet web\xplore-pro-max\xplore\View\assets\PHPMailer\src\SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;       
$mail = new PHPMailer(true);
//Server settings
                    //Enable verbose debug output

 try {
                         //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth = true;                                   //Enable SMTP authentication
$mail->Username = 'firas1.rfrf@gmail.com';                     //SMTP username
$mail->Password = 'jlqepropgjuciisi';                               //SMTP password
$mail->SMTPSecure = 'tls ';            //Enable implicit TLS encryption
$mail->Port = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

$mail->setFrom('Xplore@gmail.com');
$mail->addAddress($email);     

 //Content
 $mail->isHTML(true);                                 
 $mail->Subject = 'Booking reciept';
 $mail->Encoding = 'base64';

 // Path to your HTML file
$htmlFilePath = 'C:\Users\saifa\Desktop\projet web\xplore-pro-max\xplore\View\assets\PHPMailer\transaction_details.html';

// Read the content of the HTML file
$htmlContent = file_get_contents($htmlFilePath);

// Replace the PHP variables with their values
$htmlContent = str_replace(
    array('$generatedID3', '$itemPrice', '$name', '$lname', '$email', '$hname', '$checkInDate', '$checkOutDate', '$phoneNumber', '$numberOfGuests', '$today'),
    array($generatedID3, $itemPrice, $name, $lname, $email, $hname, $checkInDate, $checkOutDate, $phoneNumber, $numberOfGuests, $today),
    $htmlContent
);

// Assign the HTML content to the Body property of your email object
$mail->Body = $htmlContent;

                   



 $mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>



<script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_SANDBOX?PAYPAL_SANDBOX_CLIENT_ID:PAYPAL_PROD_CLIENT_ID; ?>&currency=<?php echo $currency; ?>"></script>
<div class="panel">
    <div class="overlay hidden"><div class="overlay-content"><img src="css/loading.gif" alt="Processing..."/></div></div>

    <div class="panel-heading">
        <h3 class="panel-title">Pay <?php echo '$'.$itemPrice; ?> with PayPal</h3>
        
      
        <p><b>Item Name:</b> <?php echo $reservationMessage; ?></p>
        <p><b>Price:</b> <?php echo '$'.$itemPrice.' '.$currency; ?></p>
    </div>
    <div class="panel-body">
      
        <div id="paymentResponse" class="hidden"></div>
        
     
        <div id="paypal-button-container"></div>
    </div>
</div>
<script>
paypal.Buttons({

    createOrder: (data, actions) => {
        return actions.order.create({
            "purchase_units": [{
                "custom_id": "<?php echo $itemNumber; ?>",
                "description": "<?php echo $itemName; ?>",
                "amount": {
                    "currency_code": "<?php echo $currency; ?>",
                    "value": <?php echo $itemPrice; ?>,
                    "breakdown": {
                        "item_total": {
                            "currency_code": "<?php echo $currency; ?>",
                            "value": <?php echo $itemPrice; ?>
                        }
                    }
                },
                "items": [
                    {
                        "name": "<?php echo $itemName; ?>",
                        "description": "<?php echo $itemName; ?>",
                        "unit_amount": {
                            "currency_code": "<?php echo $currency; ?>",
                            "value": <?php echo $itemPrice; ?>
                        },
                        "quantity": "1",
                        "category": "DIGITAL_GOODS"
                    },
                ]
            }]
        });
    },
   
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            setProcessing(true);

            var postData = {paypal_order_check: 1, order_id: orderData.id};
            fetch('paypal_checkout_validate.php', {
                method: 'POST',
                headers: {'Accept': 'application/json'},
                body: encodeFormData(postData)
            })
            .then((response) => response.json())
            .then((result) => {
                if(result.status == 1){
                    window.location.href = "payment-status.php?checkout_ref_id="+result.ref_id;
                }else{
                    const messageContainer = document.querySelector("#paymentResponse");
                    messageContainer.classList.remove("hidden");
                    messageContainer.textContent = result.msg;
                    
                    setTimeout(function () {
                        messageContainer.classList.add("hidden");
                        messageText.textContent = "";
                    }, 5000);
                }
                setProcessing(false);
            })
            .catch(error => console.log(error));
        });
    }
}).render('#paypal-button-container');

const encodeFormData = (data) => {
  var form_data = new FormData();

  for ( var key in data ) {
    form_data.append(key, data[key]);
  }
  return form_data;   
}

// Show a loader on payment form processing
const setProcessing = (isProcessing) => {
    if (isProcessing) {
        document.querySelector(".overlay").classList.remove("hidden");
    } else {
        document.querySelector(".overlay").classList.add("hidden");
    }
}    
</script>
