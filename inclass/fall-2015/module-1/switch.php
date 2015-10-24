<?php

#############################
#######SWITCH CASE###########
#############################

// Sub-optimal way of doing things
$statusCode = 500;
if ($statusCode == 500) {
    echo 'Internal Server Error';
} elseif ($statusCode == 301) {
    echo 'Redirect';
} elseif ($statusCode == 200) {
    echo 'Everything is cool';
} else {
    echo 'I have no idea';
}
echo '<hr/>';

switch ($statusCode) {

    case 500:
        echo 'Internal server error';
        break;

    case 301:
        echo 'Redirect';
        break;

    case 200:
        echo 'Everything is cool';
        break;

    default:
        echo 'I have no idea';
}