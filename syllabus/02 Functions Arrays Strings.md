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
A function is a block of code that may accept some input as parameters, will execute statements contained therein and may or may not return a value.
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

Here is how you can pass arguments to a function. Notice that the last argument, ```$shouldBake```, is defaulted to false.
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

#### Returning values
As we mentioned earlier, a function can return a value.
The only way for a client that uses your function to know what value it will return is because you mention an ```@return <type>``` in the [DocBlock](http://en.wikipedia.org/wiki/PHPDoc#DocBlock).

```php
<?php

/**
 * Get today's date
 *
 * @return string
 */
function getDate()
{
    return date('m/d/Y');
}
```

#### Distinction between 'by value' and 'by reference' arguments
In PHP you can pass arguments into a function in two values
- By Value
When you pass in an argument by value, a copy of the variable you are passing in is given to the function.
The original variable is unaltered.

- By Reference
If you pass in a variable by reference, a pointer to the original variable is passed in to the function.
Any mutation to the variable within the function will affect the original variable that was passed in.

Lets take an example of how this works.
```php
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
```
The syntax for passing in values by reference is ```&```. Whenever you prefix any parameter with the ```&``` operator
it will be passed around by reference, i.e. only one copy of the variable will exist, and all other references will point to the original.

Let's take a look at how we can use our functions and get some output.
```php
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
```

#### Documenting the entire method



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