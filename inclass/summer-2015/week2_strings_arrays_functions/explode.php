<?php

$csv = '"samir", "31", "5421 Hickory Dr", "Austin"';

$explodedCsv = explode(',', $csv);

echo '<pre>';
print_r($explodedCsv);
echo '<pre>';

$animals = array('Dog', 'Cat', "Human");

$implodedArray = implode('.___.', $animals);

echo '<hr/>';

echo '$implodedArray='.$implodedArray;
