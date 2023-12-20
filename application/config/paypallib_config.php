<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal IPN Class
// ------------------------------------------------------------------------

// Use PayPal on Sandbox or Live
$send = getSettings();
$config['sandbox'] = $send->paypal=='sandbox'?TRUE:FALSE;; // FALSE for live environment

// PayPal Business Email ID
$config['business'] = $send->paypalid;
$config['currency_code'] =  $send->currency_code;

// If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at 
$config['paypal_lib_button_path'] = 'buttons';

// What is the default currency?
$config['paypal_lib_currency_code'] = 'USD';

?>
