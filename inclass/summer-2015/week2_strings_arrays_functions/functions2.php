<?php

/**
 * This function accepts two required arguments and one optional argument.
 * The sole purpose of this function is to make cookies!
 *
 * @param int $howMany How many cookies do you want me to make
 * @param string $name Name to print on each cookie
 * @param bool $shouldBake Should we bake these? By default we will bake these!
 *
 * @return array
 */
function makeCookies($howMany, $name, $shouldBake = true)
{
    $cookies = array();

//    if ($shouldBake == true) {
//        $cookieName = $name . ' Baked Cookie';
//    } else {
//        $cookieName = $name . ' Cookie Dough';
//    }

    // You can also rewrite the conditional above using a ternary, shortening 5 lines of code into 1
    $cookieName = $shouldBake ? $name . ' Baked Cookie' : $name . ' Cookie Dough';

    // Loop over the $howMany variable, to create elements in the $cookies array
    for ($i = 1; $i <= $howMany; $i++) {

//        array_push($cookies, $cookieName . ' - ' . $i);

        $cookies[] = $cookieName . ' - ' . $i;
    }

    // Return the array we just created, like we promised we would do in the DocBlock
    return $cookies;
}

echo '<pre>';
// Make some baked cookies
$cookies = makeCookies(5, 'Birthday');
//print_r($cookies);
//die();

// I'll take the cookie dough!
$cookieDoughCookies = makeCookies(12, 'Bar-Kie', $shouldBake = false);
print_r($cookieDoughCookies);
