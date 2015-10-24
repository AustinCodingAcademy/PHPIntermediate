<?php

// What is a session???
// A session will create a cookie locally, which will get sent to the server
// on every HTTP request

session_start();

//$_SESSION['location'] = 'Austin';
echo '<pre>';
print_r($_SESSION);

//echo 'You should have a cookie';