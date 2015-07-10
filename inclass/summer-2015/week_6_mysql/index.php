<?php

// Include the DB file
require('DBCommon.php');

$db = new DBCommon('localhost', 'root', 'root', 'acashop');

$query = 'select * from aca_product';

$db->setQuery($query);

$products = $db->loadObjectList(); // Many records
//echo '<pre>';
//print_r($products);
//echo '</pre>';

//$std = new stdClass();
//$std->name = 'Samir';
//$arr['name'] = 'Samir';


########################################################
// For one record loadObject();
// For one value loadResult();
// Get product_id = 8

$query = 'select * from aca_product where product_id = 8';
$db->setQuery($query);
$product = $db->loadObject();

echo '<h1>' . $product->name . '</h1>';
echo '<h3>' . $product->price . '</h3>';
echo '<img src="' . $product->image . '"/>';


$query = 'select price from aca_product limit 1';
$db->setQuery($query);
$price = $db->loadResult();
echo '$price=' . $price . '<br/>';

$query = 'select count(*) from aca_product';
$db->setQuery($query);
$numProducts = $db->loadResult();
echo '$numProducts=' . $numProducts . '<br/>';




























