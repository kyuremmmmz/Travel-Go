<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-oqwod30211458@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost/Website/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/Website/cancel.php'); 
define('PAYPAL_CURRENCY', 'USD'); 
 
// Database configuration 
define('DB_HOST', 'localhost:3307'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'donation'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");