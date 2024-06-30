<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptchaSecret = 'YOUR_SECRET_KEY';
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = array(
        'secret' => $recaptchaSecret,
        'response' => $recaptchaResponse,
        'remoteip' => $userIP
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptchaData)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($recaptchaUrl, false, $context);
    $resultJson = json_decode($result);

    if ($resultJson->success !== true) {
        // Handle error - the CAPTCHA was not successful
        echo 'reCAPTCHA verification failed. Please try again.';
    } else {
        // CAPTCHA was successful - process the form
        echo 'reCAPTCHA verification successful. Proceeding with form processing.';
    }
}
?>
