01 - PHP Basics
===============

> This week covers the basics of the PHP programming language and some of its most important features. 
> Most of the material presented here should be learned as acutely as possible. 
> Memorizing syntax, keywords and control structures is crucial to student success.
> Since this is an intermediate course, we will not be spending too much time on language basics. 

***

Syntax
------------------

#### PHP tags, define blocks of PHP code
```php
<?php
    echo 'This is PHP code!';
?>
This is not PHP code, just plain old text.
```

#### The use of comments
```php
<?php
// This is one way to define a comment

# This is another way to do the same thing

/*
 * This is a comment that spans
 * multiple lines
 * and is slightly different from this next comment...
 */

 /**
  * ...that has 2 ** after the first /
  * This style of commenting is used in a "docblock"
  * Use this to document a method signature
  */
```

#### Debug using die; an alias to exit
```php
<?php
    echo 'I am about to run...';
    die('I am here! and I am dead. Nothing after this line will run...');
    echo 'I will not run, because I am after the die()';
    echo 'Neither will I :/';
```

Variables
---------
Variables are containers for values.
Values are assigned to variables at run-time.
Values that don't change are known as constants.
```php
<?php
//Define some variables, and assign values to them
$personName = 'Jane Doe';
$personAddress = 'MugShots, 407 E 7th St. Austin, TX 78701';
$personAge = 26;

//Define some constants, these cannot be changed
define('HOURS_IN_DAY', 24);
define('PI_ROUNDED', 3.14159);
define('SPEED_OF_LIGHT', '299,792,458 m/s');

// Change the value for person name
$personName = 'John Doe';

// Check if a variable contains a value.
if ($personName == 'John Doe') {
    echo 'Person is a guy';
} else {
    echo 'Person is a girl';
}

// Check to see if a variable has been defined
if (isset($personName)) {
    echo 'Person Name has been defined';
}

// Display a message if a variable has ```NOT``` been defined
if (!isset($personGender)) {
    echo '$personGender has not been defined';
}
```

Data types and loose typing
---------------------------

PHP is a loosely typed language. This means you can create variables as you go, assign values to them
and PHP will figure out what type of variable you intended to create. You also have access to a host of functions that start with is_*
that you can use to determine the type of variable PHP thinks you wanted to make.
Strongly typed languages expect the programmer to define the type of data they want the variable to hold before you can store anything in it.

```php
<?php

$myInteger = 35;
$myFloat = 12.56;
$myString = "Herrrrrrro";
$myArray = array('boots', 'and', 'kats');
$myBool = false;

//Check if the variable is an integer
if (is_int($myInteger)) {
    echo $myInteger . ' is an integer';
}

//Check if the variable is a float
if (is_float($myFloat)) {
    echo "$myFloat is a float";
}

//Check if the variable is a string
if (is_string($myString)) {
    echo "{$myString} is a string!";
}

//Check if the variable is an array
if (is_array($myArray)) {
    echo '$myArray is an array';
}

// Check if the variable is a boolean and print out a message using ternary syntax
echo is_bool($myBool) ? '$myBool is a boolean value' : '$myBool is not a boolean value';
```

Typecasting i.e. converting one type to another
-----------------------------------------------

Sometimes you may need to change the type of a variable from one type to another. This is known as typecasting.
You may want to do this if you had a string, that was really a number, and you wanted to add something to it.
```php
<?php
$stringNumber = "15";
echo 'Type of $stringNumber is: ';
var_dump($stringNumber);

echo PHP_EOL;

$actualNumber = 10;
echo 'Type of $actualNumber is: ';
var_dump($actualNumber);

echo PHP_EOL;

$castedIntegerString = (int)$stringNumber;
echo 'Type of $castedIntegerString is: ';
var_dump($castedIntegerString);

echo PHP_EOL;

$castedFloatString = (float)$stringNumber;
echo 'Type of $castedFloatString is: ';
var_dump($castedFloatString);

echo PHP_EOL;

$castedArray = (array) $castedFloatString;
echo 'Casting a float to an array is also legal: ';
var_dump($castedArray);
```

Operators
---------
We use operators in PHP to combine, add, subtract and multiply. Arrays in PHP are first class citizens.
Take a look at this list of [All Array functions](http://php.net/manual/en/ref.array.php) to get an idea of the things you can do with them.
```php
<?php

echo '12 + 2 = ' . (12 + 2);
echo PHP_EOL;

echo '12.3 - 4.2 = ' . (12.3 - 4.2);
echo PHP_EOL;

echo '5 * 10 = ' . (5 * 10);
echo PHP_EOL;

echo 'My name is ' . "Samir";
echo PHP_EOL;

$numApples = 12;
echo 'I have ' . $numApples . ' apples';

//Merge two arrays together
$fruits = array('orange', 'apple', 'banana');
$places = array('colorado', 'california', 'maryland');
$combinedArray = array_merge($fruits, $places);
print_r($combinedArray);
```

Control Structures
------------------
Control structures are used to control the flow of your code and make your program make decisions based on some given input.

#### if-else
```php
<?php

// Simple conditional using an if else statement
$location = 'Austin';
if ($location == 'Austin') {
    echo 'Your town rocks!';
} else {
    echo 'Your town is cool';
}
```

#### Nested conditional
A nested condition is a condition within a condition i.e. an if statement within another if statement.
```php
<?php

// Use a nested conditional i.e. a condition within a condition
$myFlower = 'lily1';
$myAnimal = 'human';
$flowers = array('rose', 'daisy', 'lily', 'lotus');
$animals = array('monkey', 'tiger', 'lion', 'human');

if(in_array($myFlower, $flowers)){
    echo 'A '.$myFlower.' smells great! ';
    if(in_array($myAnimal, $animals)){
        echo "and a $myAnimal is a killer!";
    }else{
        echo 'and a "'.$myAnimal.'" is not dangerous!';
    }
}else{
    echo "A $myFlower is not very pleasant!";
}
```

#### switch-case
```php
<?php

// Translate HTTP error codes
$errorCode = 404;

switch ($errorCode) {
    case 404:
        $errorMessage =  'Not found!';
        break;
    case 500:
        $errorMessage = 'Internal Server Error';
        break;
    case 304:
        $errorMessage = 'Not Modified';
        break;
    default:
        $errorMessage = 'Invalid error code!';
}

echo 'Error code '.$errorCode.' means '.$errorMessage;
```
#### for loop
A for loop is a looping structure we should use when we want to do something or go over something a fixed number of times.
```php
<?php

// Print the numbers from 1 to 100
for ($i = 1; $i <= 100; $i++) {
    echo $i.' ';
}
```

#### foreach loop
A foreach loop allows you to loop over each individual item in an array.
```php
<?php

/*
 * Loop over all the cats.
 * You don't need to know how many there are, or where to stop.
 */
$cats = array('persian', 'bobtail', 'burmese', 'bengal');
foreach($cats as $cat){
    echo $cat.' ';
}
```

#### while loop
A while loop will keep running forever until the condition it evaluates is false.
```php
<?php

// This example prints out lots of periods

$keepRunning = true;
$counter = 0;

while($keepRunning == true){
    echo '<div style="float:left;">.</div>';
    ++$counter;
    if($counter == 10000){
        $keepRunning = false;
    }
}
```

[NEXT](02 Strings Functions Arrays.md)

***

##### Homework 01 - Count Types

[Sample Code](homework/01_count_types.md)

We will be creating a simple program, that can be executed in the [CLI](http://en.wikipedia.org/wiki/Command-line_interface) or in the browser.

Create a function that will count the number of int, float, bool and string data types in a given input string.

The input string contains formatted numbers, and numbers with other formatting characters like exclamation marks.

Words like "true" and "false" are considered to be boolean. The sample code lays out the foundation for you to start work.

If you are not happy with the layout of the sample code, feel free to extract the parts you are happy with and do it your way.

Know that there are multiple ways to solve any given problem, and no two people will solve a problem in exactly the same way.
