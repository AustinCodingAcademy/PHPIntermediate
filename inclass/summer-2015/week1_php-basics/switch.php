<?php

// Translate HTTP error codes
$errorCode = 123;

switch ($errorCode) {

    case 404:
        $errorMessage =  'Not found!';
        break;

    case 500:
        $errorMessage = 'Internal Server Error';
        break;

    case 304:
        $errorMessage = 'Not Modified';
        break;

    case 403:
        $errorMessage = 'Forbidden';
        break;

    default:
        $errorMessage = 'Invalid error code!';
}

echo $errorMessage;
