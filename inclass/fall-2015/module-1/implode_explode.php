<?php

// Super useful!

$data = '"Samir", "Austin", "31", "Loves dogs", "Does not love cockroaches"';
$dataArray = explode(",", $data);

echo '<pre>';
print_r($dataArray);

$newData = array('coffee', 'juice', 'yerba mate');
echo implode('.__.', $newData) . PHP_EOL;