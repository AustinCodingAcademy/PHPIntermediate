<?php

// How do we access the pieces?
$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

// Give each piece a name, or categorize each piece.
$category = $parts[6];
echo '$category=' . $category . '<br/>';

$subCategory = $parts[7];
echo '$subCategory=' . $subCategory . '<br/>';

$product = $parts[8];
echo '$product=' . $product . '<br/>';
