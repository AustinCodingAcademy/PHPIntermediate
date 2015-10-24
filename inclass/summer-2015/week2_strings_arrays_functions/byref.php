<?php

/**
 * Accept an argument by value
 *
 * @param string $immutable Some string
 *
 * @return void
 */
function mutateUniverse($immutable)
{
    //This value will not be changed on the outside, just inside the function as it is copied.
    $immutable .= 'The universe is expanding, so it is mutable!';
}

/**
 * Accept an argument by reference
 *
 * @param string $mutant Some string representing a mutant, passed in byref
 *
 * @return void
 * @note The variable that is passed in will be altered, because this function mutates it
 */
function mutateMutant(&$mutant)
{
    // The caller's copy of the variable will be mutated
    $mutant .= 'but he is really Wolverine!';
}


// use these functions
$return = mutateUniverse('something');
echo '<br/>';
echo '$return by value =' . $return;
echo '<hr/>';


$mutatedValue = 'This is the beginning.....';

mutateMutant($mutatedValue);

echo '$mutatedValue=' . $mutatedValue;