<?php

/** @var array $states Some American states */
$states = array(
    'AK' => "Alaska",
    'AZ' => "Arizona",
    'CA' => "California",
    'CO' => "Colorado",
    'CT' => "Connecticut",
    'DC' => "District Of Columbia",
    'HI' => "Hawaii",
    'ME' => "Maine",
    'MD' => "Maryland",
    'MA' => "Massachusetts",
    'MI' => "Michigan",
    'MN' => "Minnesota",
    'MT' => "Montana",
    'NV' => "Nevada",
    'NH' => "New Hampshire",
    'NJ' => "New Jersey",
    'NM' => "New Mexico",
    'NY' => "New York",
    'OR' => "Oregon",
    'RI' => "Rhode Island",
    'VT' => "Vermont",
    'WA' => "Washington"
);

// Reference a value in this array by key
echo $states['OR']; // Oregon

// You cannot reference an array with a non-numeric index numerically
//echo $states[2]; // Notice:  Undefined offset: 2

// Add a value to this array
$states['TX'] = 'Texas';

// Remove a value from this array
unset($states['ME']);

// Replace a value from this array
$states['CA'] = 'Cali';

echo '<pre>';
print_r($states);
die();
