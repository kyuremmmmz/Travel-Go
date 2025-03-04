<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-i5eqx29965437@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost:8000/Main/success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost:8000/Main/cancel.php'); 
define('PAYPAL_CURRENCY', 'PHP');  
 
// Database configuration 
define('DB_HOST', 'localhost:3307'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', 'admin'); 
define('DB_NAME', 'sample'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");