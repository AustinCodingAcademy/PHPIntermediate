<?php

// Validate an email address

$emailAddress = $_POST['email'];


//if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
//    echo 'Email ' . $emailAddress . ' is valid!';
//} else {
//    echo 'Email ' . $emailAddress . ' is INvalid!';
//}


$sanitizedString = filter_var($emailAddress, FILTER_SANITIZE_STRING);

//$sanitizedString = $emailAddress;

echo '<pre>';
echo $sanitizedString;
