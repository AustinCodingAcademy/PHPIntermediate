<?php

/**
 * Pass in an argument by value
 *
 * @param string $immutable Some string
 *
 * @return void
 */
function mutateUniverse($immutable)
{
    //This value will not be changed on the outside, just inside the function as it is copied.
    $immutable = 'The universe is expanding, so it is mutable!';
}

/**
 * Mutate a varible on the outside as we are passing in a value by
 *
 * @param string $mutant Some string representing a mutant, passed in byref
 *
 * @return void
 */
function mutateMutant(&$mutant)
{
    // The caller's copy of the variable will be mutated, and
    $mutant .= 'but he is really Wolverine!';
}

// Example of calling function by value
$fact = 'The universe is timeless, eternal and cannot be changed?';
echo '$fact before call: '.$fact."\n";
mutateUniverse($fact); // $fact is not mutated and it stays the same
echo '$fact after call: '.$fact."\n";

// Example of calling function by reference
$wolverine = 'Looks like a regular guy...';
echo '$wolverine before call: '.$wolverine."\n";
mutateMutant($wolverine);
echo '$wolverine after call: '.$wolverine."\n";