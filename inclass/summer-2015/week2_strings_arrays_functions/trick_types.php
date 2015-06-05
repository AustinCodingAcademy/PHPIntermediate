<?php

$myType = str_replace(',', '', "100,000,00");
$myCastedType = (int)$myType;

if (is_int($myCastedType) && $myCastedType != 0) {
    echo 'I am an integer';
} else {
    echo 'I am something else';
}