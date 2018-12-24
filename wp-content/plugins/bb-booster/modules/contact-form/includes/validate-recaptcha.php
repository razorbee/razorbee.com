<?php

// Do recaptcha validation here so we can only load for php 5.3 and above.
require_once FL_BUILDER_DIR . 'includes/vendor/recaptcha/autoload.php';

$recaptcha = new \ReCaptcha\ReCaptcha($settings->recaptcha_secret_key);
$resp = $recaptcha->verify($_POST['recaptcha_response'], $_SERVER['REMOTE_ADDR']);

if ( $resp->isSuccess() ) {
	$response['error'] = false;
}
else {
	$response['error'] = true;
	$response['message'] = '<strong>reCAPTCHA Error: </strong>';
	$error_codes = array();
	foreach ($resp->getErrorCodes() as $code) {
		$error_codes[] = $code;			               
    }
    $response['message'] .= implode(' | ', $error_codes);
}