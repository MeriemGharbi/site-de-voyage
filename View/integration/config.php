<?php
$itemNumber = "DP12345"; 
$itemName = "Demo Product"; 
$itemPrice = 75;  
$currency = "USD"; 

define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'AY3y9zVgpIYr1PBKTH0psKyNHvYgip3BvlujWoxFwhmab8pPXM8fd94amxkuwfwBMNqlth4sVZS5kV27'); 
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EAbgxgzwSXSa27TGzrGciQrY6OM8416fKJGZ9gf3QHMzOp704aRDPsoqhUxMqV_JWoLCbTMRhMnoIaCu'); 
define('PAYPAL_PROD_CLIENT_ID', 'Insert_Live_PayPal_Client_ID_Here'); 
define('PAYPAL_PROD_CLIENT_SECRET', 'Insert_Live_PayPal_Secret_Key_Here'); 
class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "xplore";

            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=xplore',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>



