<?php

/**
 * @param string $name This is the just the first name
 * @param string $location This is the state you live in
 * @param int $age This is how old you are
 * @return string
 */
function sayHello($name, $location = 'Austin', $age = 21)
{
    return 'Hi ' . $name . ' ' . $location . ' is awesome for a ' . $age . ' year old';
}

$helloString = sayHello('Samir');

//echo $helloString;

/**
 * @param $data
 * @param null $name
 */
function pre($data, $name = null)
{
    if (!empty($name)) {

        if (php_sapi_name() == 'cli') {

            echo "\n";
            echo "-----------------------------\n";
            echo $name . "\n";
            echo "-----------------------------\n";
        } else {

            echo '<h3>' . $name . '</h3>';
        }
    }

    if (is_object($data) || is_array($data)) {

        echo '<pre>';
        print_r($data);
        echo '</pre>';

    } else {
        echo $data . "\n";
    }
}

$pets = array('dog', 'cat', 'walrus');
pre($pets, 'Pets');