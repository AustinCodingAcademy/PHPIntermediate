<?php

$outsideFunction = "This is a string defined outside the function";

function myUsefulFunction(){

    // Cannot access the variable $outsideFunction here
    // Notice: Undefined variable: outsideFunction
    echo $outsideFunction;

    $insideFunction = 'I am inside the function';

    echo $insideFunction;
}

// Cannot access the variable we defined inside the function here
// Notice: Undefined variable: insideFunction
echo $insideFunction;


// Call the function we just defined
myUsefulFunction();