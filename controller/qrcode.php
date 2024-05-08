<?php
include('phpqrcode/qrlib.php'); // Include the QR Code library
// URL to encode in the QR code
$lien = 'insert.php'; // Modify the link as needed
// Output the QR code directly to the browser
QRcode::png($lien);

exit; // Stop further execution to prevent HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <img src="generate_qr_code.php" alt="QR Code">
</body>
</html>
