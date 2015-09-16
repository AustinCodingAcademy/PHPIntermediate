<?php

$var = 'foo'; // This is a one line comment

/*
 * This
 * is a multi
 * line comment
 */
$var = 'complex';

/**
 * This is known as standard doc-block notation
 * @param string $name First name only
 * @param int $age Age as a number only
 * @return int
 */
function foo($name, $age)
{
    return 12;
}

echo 'I am here';
echo "<br/>";
echo 'So am i';

