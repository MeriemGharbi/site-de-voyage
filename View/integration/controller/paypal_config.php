<?php 
/* 
 * This is - PayPal and database configuration -  
*/ $itemNumber = "DP12345"; 
$itemName = "Demo Product"; 
$itemPrice = 75;  
$currency = "USD"; 
  
// PayPal configuration 
define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'AY3y9zVgpIYr1PBKTH0psKyNHvYgip3BvlujWoxFwhmab8pPXM8fd94amxkuwfwBMNqlth4sVZS5kV27'); 
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EAbgxgzwSXSa27TGzrGciQrY6OM8416fKJGZ9gf3QHMzOp704aRDPsoqhUxMqV_JWoLCbTMRhMnoIaCu'); 
define('PAYPAL_PROD_CLIENT_ID', 'Insert_Live_PayPal_Client_ID_Here'); 
define('PAYPAL_PROD_CLIENT_SECRET', 'Insert_Live_PayPal_Secret_Key_Here'); 

 
define('PAYPAL_RETURN_URL', 'http://localhost/rb_github/paypal/paypal-rb/paypal_success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/rb_github/paypal/paypal-rb/paypal_cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/rb_github/paypal/paypal-rb/paypal_ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 


// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

