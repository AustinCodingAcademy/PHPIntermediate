<?php

/**
 * Create some cookies
 *
 * @param int    $howMany    How many cookies do you want me to make
 * @param string $name       Name to print on each cookie
 * @param bool   $shouldBake Should we bake these? By default we will bake these!
 *
 * @return array
 */
function makeCookies($howMany, $name, $shouldBake = true)
{
    $biscuits = array();

    if ($shouldBake == true) {
        $biscuitName = $name . ' Baked Cookie';
    } else {
        $biscuitName = $name . ' Cookie Dough';
    }

    // You can also rewrite the conditional above using a ternary, shortening 5 lines of code into 1
    $biscuitName = $shouldBake ? $name . ' Baked Cookie' : $name . ' Cookie Dough';

    for ($i = 1; $i <= $howMany; $i++) {
        $biscuits[] = $biscuitName . ' - ' . $i;
    }

    return $biscuits;
}

$cookies = makeCookies(12, 'Foo-Kie', false);
print_r($cookies);