02 - Functions, Arrays & Strings
----------------------------
>Now that we have the basics out of the way, we will be looking at functions in greater detail.
>Encapsulating our procedural style code, into reusable units, is arguably one of the most important concepts in programming.
>Arrays are one of the most useful and handy data structures that you will use almost every day in your life as a developer.
>String manipulation is an important skill. We will become familiar with strings, searching through them, checking if a 
value is in a string, replacing values, formatting etc... With over 90 native functions, we will have plenty to keep us busy!

***

Functions
---------

#### Creating a function
A function is a block of code that may accept some input as parameters, will execute some localized block of code and may or may not return a value.
```php
<?php

/**
 * Just say it
 * @return string
 */
function sayFoo()
{
    return 'Fooooooooo';
}
```

A function can accept arguments, type hinted arguments and optional default arguments
```php
<?php

/**
 * This function accepts two required arguments and one optional argument.
 * The sole purpose of this function is to make cookies!
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

// Make some baked cookies
$cookies = makeCookies(12, 'Foo-Kie');
print_r($cookies);

// I'll take the cookie dough!
$cookieDoughCookies = makeCookies(12, 'Foo-Kie', $shouldBake = false);
print_r($cookieDoughCookies);

```


#### Distinction between 'by value' and 'by reference' arguments

* Returning values
* Documenting the entire method
* Variable scope within a function
* Throwing exceptions
* Variable length arguments with [func_get_args()](http://us3.php.net/manual/en/function.func-get-args.php)

### Arrays
* How to create an array
* Basic array operations i.e. adding/removing/replacing values
* Referencing values in an array
* Looping through an array
* Creating a hash table for fast index lookups
* Sorting arrays

### Strings
* Creating a string
* Concatenating two strings
* Concatenating mixed types
* Escaping literal values
* Referencing individual characters using array notation
* Simple string search
* Formatting strings and numbers