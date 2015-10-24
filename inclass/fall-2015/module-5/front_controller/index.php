<?php

$requestUri = $_SERVER['REQUEST_URI'];
$pieces = explode('/', $requestUri);
$numPieces = sizeof($pieces);

$route = [];
$route[] = $pieces[$numPieces - 1];
$route[] = $pieces[$numPieces - 2];
$route[] = $pieces[$numPieces - 3];

$route = array_reverse($route);

$sefRoute = implode('/', $route);

// This is the input for example
// http://www.epicurious.com/recipes/food/thai-curry-367651
echo '$sefRoute='.$sefRoute;