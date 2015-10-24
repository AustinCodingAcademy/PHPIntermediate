02 - Strings, Functions & Arrays
----------------------------
>Now that we have the basics out of the way, we will be looking at functions in greater detail.
>Encapsulating our procedural style code, into reusable units, is arguably one of the most important concepts in programming.
>Arrays are one of the most useful and handy data structures that you will use almost every day in your life as a developer.
>String manipulation is an important skill. We will become familiar with strings, searching through them, checking if a 
value is in a string, replacing values, formatting etc... With over 90 native functions, we will have plenty to keep us busy!

***

Strings
-------
Strings are very important in PHP. As a web developer you will find yourself using and manipulating strings more often than other tasks.
It is quite important that you understand the difference between simple and complex strings, concatenating, escaping, referencing, searching and formatting strings.
Lets take a look at each one of these **important** string topics individually.

#### Creating a string
Creating a string is a simple affair.
```php
<?php

$mySimpleString = 'This is a simple string';
$myComplexString = "This is a complex string"; // Why is this complex?
```

Note that the difference between a simple string and a complex string is that simple strings are enclosed in ```'``` while complex strings are enclosed in ```"```.
The reason why a distinction like this exists will become clear once we study the following example.
```php
<?php

$myName = "Samir";

// Simple string will print out just what you see here.
$simpleString = 'My name is $myName'; // My name is $myName
echo 'Simple String: ' . $simpleString . "\n";

// Complex strings will replace the value of the variable in the string itself.
$complexString = "My name is $myName" . "\n"; // My name is Samir
echo 'Complex String: ' . $complexString . "\n";
```

As you can see the simple string is enclosed in ```'``` and the value of the variable ```$myName``` is not printed.
Instead the name of the variable is printed.
In the case of a complex string, which is enclosed in ```"```, the value of the variable ```$myName``` is replaced with Samir.
Also note that each of the lines is terminated with a ```"\n"```. This is a special character called a newline and is equivalent to hitting the enter key.

#### Concatenating two strings
You can concatenate two strings, or a string and an int or float using the ```.``` character. For instance
```php
<?php

$string1 = 'My name is';
$string2 = 'Samir';
$myNumber = 124;
$myFloat = 456.343;

$concatenatedString = $string1 . ' ' . $string2 . ' ' . $myNumber. ' '. $myFloat;
echo 'Concatenated String: ' . $concatenatedString;
```

#### Escaping literal values
As we just learned, the ```"``` character and the ```'``` character have special meaning in strings.
We also learned that ```\n``` enclosed in double quotes is actually a newline character.
What happens when we need to print out an actual double quote or single quote, or newline character?
PHP, like most languages, allow you to escape special characters with a ```\```

```php
<?php

echo "This is how you print a \" in a string enclosed by double quotes";

echo "\n"; // This is how you print a newline

echo 'This is how you print a \' in a string enclosed by single quotes';

echo "\n";

echo "This is how you print a single slash \\ i.e. escape the escape character";

```

#### Referencing individual characters using array notation
In PHP, strings can be referenced using array notation. You can think of a string as an array of characters.

```php
<?php

$longString = 'This is a really long string';

$howLong = strlen($longString);

echo '$longString is '.$howLong.' characters long!'.PHP_EOL;

for($i = 0; $i < $howLong; $i ++){
    echo $longString[$i]."\t";
}
```

#### Simple string search

* Formatting strings and numbers

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
In PHP you can pass arguments into a function in two ways
- By Value ```byval``` -  When you pass in an argument by value, a copy of the variable you are passing in is given to the function. The original variable is unaltered.

- By Reference ```byref``` - If you pass in a variable by reference, a pointer to the original variable is passed in to the function.
Any mutation to the variable within the function will affect the original variable that was passed in.

Lets take an example of how this works.
```php
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
    $immutable = 'The universe is expanding, so it is mutable!';
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
mutateMutant($wolverine); // $wolverine is mutated because it is passed in byref
echo '$wolverine after call: '.$wolverine."\n";
```

#### Documenting functions using DocBlock
Documenting a function is slightly time consuming and doesn't seem to provide any immediate benefit at first.
However, documenting is more important than the actual code you will write. It is of paramount importance that code be readable.
As a developer, you will end up reading lots of source code. Nobody likes reading badly formatted/undocumented code.
Here are a few simple rules to follow:
- Specify what your function does in plain english e.g. ```This method teaches you karate```
- Specify the type of each argument e.g. ```@param string```
- Mention the name of the variable that matches the argument name ```@param string $personName```
- Describe your variable ```@param string $personName Name of the karate student```
- Type hint function arguments if they are complex objects e.g. ```Person $person```
- Specify a return type e.g. ```@return string```
- Mention any Exceptions that your function throws e.g. ```@throws MissingDataException```

If you document your methods property, specify the name, number and kind of arguments it accepts,
specify a return type and mention if the function throws any Exceptions, then you have documented your function perfectly!

Lets study a properly formatted function DocBlock
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
Notice how each argument's type is specified i.e. ```string```, ```int```, ```array``` etc...
followed by the argument variable name followed by a description of the argument.
Use ```@return``` notation to indicate what your function returns.
You may optionally provide a string description of the return type in case it isn't intuitive.

Here is how you would call the above function, and test it's return value.
```php
<?php

$students = array('Hugh Jass', 'Kung Fu Panda', 'Donald Macaque');

if(learnKarate($instructorName = 'Chun Lee', $numStudents = 12, $students)){
    echo 'Everyone is a karate kid!';
}else{
    echo 'Some kids were left behind!';
}
```

#### Variable scope within a function
PHP has a global scope, a function scope and a class scope.
Since global scope is really bad programming practice, we will not be discussing it.
Scope is the ability for you to access certain variables.
When inside a function, you have a blank slate.
Any new variable you crate, even if it has the same name as a variable outside the function,
will be new and independent from any other variable anywhere else.
Class scope refers to your ability to access variables inside a class.


Arrays
------

An array is a the most commonly used data structure in PHP and is used to hold a contiguous collection of data.
They are extremely flexible and can store just about anything you can think of.
Take a look at this comprehensive list of [array functions](http://php.net/manual/en/ref.array.php) to get an idea of the things you can do with them.

#### Creating an array
```php
<?php

// Create an array using  Array() syntax
$shoppingList = Array('Banana', 'Almond Milk', 'Cilantro', 'Apples');
echo 'Create an array using Array() syntax:' . PHP_EOL;
print_r($shoppingList);

echo PHP_EOL;

// Another way to create an array using shorthand syntax
$verboseShoppingList[] = 'Banana';
$verboseShoppingList[] = 'Almond milk';
$verboseShoppingList[] = 'Cilantro';
$verboseShoppingList[] = 'Apples';
echo 'Shorthand array syntax:' . PHP_EOL;
print_r($verboseShoppingList);

echo PHP_EOL;

// Create an array with keys using array(). Note: You can also make it lowercase
$businessCard = array(
    'name' => 'Samir',
    'phone' => '(512) 745-7846',
    'email' => 'samir@austincodingacademy.com'
);
echo 'Array with keys and values using array() syntax:' . PHP_EOL;
print_r($businessCard);

echo PHP_EOL;

//Create an array with keys using shorthand syntax
$verboseBusinessCard['name'] = 'Samir';
$verboseBusinessCard['phone'] = '(512) 745-7846';
$verboseBusinessCard['email'] = 'samir@austincodingacademy.com';
echo 'Array with keys and values using shorthand syntax:' . PHP_EOL;
print_r($verboseBusinessCard);
```

#### Basic array operations i.e. referencing/adding/removing/replacing values
You can manipulate values in an array by referencing the ```index``` i.e. the position of the data element you want to manipulate.
```php
<?php

/** @var array $states Some American states */
$states = array(
    'AK' => "Alaska",
    'AZ' => "Arizona",
    'CA' => "California",
    'CO' => "Colorado",
    'CT' => "Connecticut",
    'DC' => "District Of Columbia",
    'HI' => "Hawaii",
    'ME' => "Maine",
    'MD' => "Maryland",
    'MA' => "Massachusetts",
    'MI' => "Michigan",
    'MN' => "Minnesota",
    'MT' => "Montana",
    'NV' => "Nevada",
    'NH' => "New Hampshire",
    'NJ' => "New Jersey",
    'NM' => "New Mexico",
    'NY' => "New York",
    'OR' => "Oregon",
    'RI' => "Rhode Island",
    'VT' => "Vermont",
    'WA' => "Washington"
);

// Reference a value in this array by key
echo $states['OR']; // Oregon

// You cannot reference an array with a non-numeric index numerically
echo $states[2]; // Notice:  Undefined offset: 2

// Add a value to this array
$states['TX'] = 'Texas';

// Remove a value from this array
unset($states['ME']);

// Replace a value from this array
$states['CA'] = 'Cali';
```

#### Looping through an array
You can iterate through each element in an array and do something with it.
```php
<?php

/** @var array $weeklyTemperatures Array of temperature readings this week */
$weeklyTemperatures = array(75.43, 84.87, 78.34, 88.34, 79.93, 83.34, 85.93);

// Calculate the average temperature
$avgTemperature = 0.00;
$numReadings = sizeof($weeklyTemperatures);

foreach ($weeklyTemperatures as $dailyTemperature) {
    $avgTemperature += $dailyTemperature;
}

$avgTemperature = $avgTemperature / $numReadings;

echo 'The average temperature is: ' . $avgTemperature . PHP_EOL;

// Figure out the hottest day
$hottestDay = 0.00; // Start off with 0

foreach($weeklyTemperatures as $dailyTemperature){

    // If the hottest day is less than the current day
    // Make the hottest day the current day's temperature
    if($hottestDay < $dailyTemperature){
        $hottestDay = $dailyTemperature;
    }
}

echo 'The hottest day is: '.$hottestDay.PHP_EOL;
```

PHP provides you with a number of helpful array functions.
```php
<?php

echo 'The hottest day is: '. max($weeklyTemperatures).PHP_EOL;
echo 'The coldest day is: '.min($weeklyTemperatures).PHP_EOL;
```

#### Creating a hash table for fast index lookups
Think of a hash table as a dictionary, when you know the work you are looking for, you go right to it and lookup its definition.
The reason why you can do that, is because the dictionary is sorted alphabetically. We can create a similar structure in PHP, using an array.
```php
<?php

/** @var array $medicalCodes Medical disorder codes. Key is code value is the disorder itself. */
$medicalCodes = array(
    369 => 'Blindness and low vision',
    372 => 'Disorders of conjunctiva',
    377 => 'Disorders of optic nerve and visual pathways',
    378 => 'Strabismus and other disorders of binocular eye movements',
    380 => 'Disorders of external ear',
    383 => 'Mastoiditis and related conditions'
);

// If you know the code, i.e. the key, getting the value is extremely fast.
echo $medicalCodes[377]; // Disorders of optic nerve and visual pathways
```

#### Sorting arrays
PHP has several functions you can use to sort arrays, you can read all about them [here](http://php.net/manual/en/array.sorting.php).
The most commonly used method is ```sort()```
``` php
<?php

/** @var array $randomArray Array of random things */
$randomArray = array('Feather', 'Baseball', 'Santiago', 'Video', 'Lace', 'Gravy', 'Sunglasses');

print_r($randomArray); // unsorted

// Sort this array
sort($randomArray);

print_r($randomArray); // Sorted :)
```