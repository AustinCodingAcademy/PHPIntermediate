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
    $cookies = array();

    if ($shouldBake == true) {
        $cookieName = $name . ' Baked Cookie';
    } else {
        $cookieName = $name . ' Cookie Dough';
    }

    // You can also rewrite the conditional above using a ternary, shortening 5 lines of code into 1
    $cookieName = $shouldBake ? $name . ' Baked Cookie' : $name . ' Cookie Dough';

    // Loop over the $howMany variable, to create elements in the $cookies array
    for ($i = 1; $i <= $howMany; $i++) {
        $cookies[] = $cookieName . ' - ' . $i;
    }

    // Return the array we just created, like we promised we would do in the DocBlock
    return $cookies;
}

// Make some baked cookies
$cookies = makeCookies(12, 'Foo-Kie');
print_r($cookies);

// I'll take the cookie dough!
$cookieDoughCookies = makeCookies(12, 'Bar-Kie', $shouldBake = false);
print_r($cookieDoughCookies);

```

#### Returning values
As we mentioned earlier, a function can return a value.
The only way for a client that uses your function to know what value it will return is because you mention it via ```@return <type>``` in the [DocBlock](http://en.wikipedia.org/wiki/PHPDoc#DocBlock).

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
- By Value -  When you pass in an argument by value, a copy of the variable you are passing in is given to the function. The original variable is unaltered.

- By Reference - If you pass in a variable by reference, a pointer to the original variable is passed in to the function.
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
    // The caller's copy of the variable will be mutated
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

#### Documenting functions using DocBlock

Documenting a function is slightly time consuming and doesn't seem to provide any immediate benefit at first.
However, documenting is more important than the actual code you are about to write. It is of paramount importance that code be readable.
As a developer, you will end up reading lots of source code. Nobody likes reading badly formatted/undocumented code.
Here are a few simple rules to follow:
- Specify what your function does in plain english e.g. ```This method teaches you karate```
- Specify the type of each argument e.g. ```@param string```
- Mention the name of the variable that matches the argument name ```@param string $personName Name of the karate student```
- Type hint your arguments if they are complex objects e.g. ```Person $person```
- Specify a return type e.g. ```@return string```
- Mention any Exceptions that your function throws e.g. ```@throws MissingDataException```

If you document your methods property, specify the name, number and kind of arguments it accepts,
specify a return type and mention if the function throws any Exceptions, then you have documented your function perfectly!

Lets look at a properly formatted function
```php
<?php

/**
 * Teach everyone how to practice karate
 *
 * @param string $name        Instructor name
 * @param int    $numStudents How many students in the class
 * @param array  $names       Array of student names
 *
 * @return bool [true = Yes! Everyone learned karate, false = No! Not everyone is a karate kid]
 */
function learnKarate($name, $numStudents, $names)
{
    echo 'Instructor for this class is: ' . $name . PHP_EOL;

    echo 'There are ' . $numStudents . ' in this karate class!' . PHP_EOL;

    foreach ($names as $name) {

        echo $name . ' is a karate kid!';
    }

    return true; // Everyone is a karate kid!
}
```
Notice how each parameter's type is specified i.e. ```string```, ```int```, ```array``` etc...
followed by the argument variable name followed by a description of the argument.
Use ```@return``` notation to indicate what your function returns. You may optionally provide a string description
of the return type in case it isn't intuitive.

Here is how you would call the above function, and test it's return value.
```php
<?php

if(learnKarate('Chun Lee', 12, ['Hugh Jass', 'Kung Fu Panda', 'Donald Macaque'])){
    echo 'Everyone is a karate kid!';
}else{
    echo 'Some kids were left behind!';
}
```

#### Variable scope within a function


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