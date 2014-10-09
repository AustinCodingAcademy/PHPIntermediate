<?php
// Lets say our example URL is: http://foo.com/products
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 'homepage';

//Trim out leading slash
$url = ltrim($url, '/');

switch ($url) {

    case 'homepage':
        echo 'Show Homepage';
        break;

    case 'products':
        echo 'Show products';
        break;

    case 'blog':
        echo 'Show Blog';
        break;

    default:
        echo '404 Page not found!';
}
