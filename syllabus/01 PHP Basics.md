01 - PHP Basics
----------
> This week covers the basics of the PHP programming language and some of its most important features. 
> Most of the material presented here should be learned as acutely as possible. 
> Memorizing syntax, keywords and control structures is crucial to student success.
> Since this is an advanced course, we will not be spending too much time on language basics. 

***

* Syntax
    * PHP tags, define blocks of PHP code
    * The use of comments
    * Print stuff to screen
    * Debug using die; an alias to exit

* Data types and loose typing
    * int, bool, float, string, NULL, resource
    * Difference between a loosely typed and strongly typed language
    * Typecasting i.e. converting one type to another

* Constants
    * Difference between a variable and a constant
    * Checking if a constant is defined
    
* Variables
    * What is a variable? why variables?
    * Creating a variable
    * Checking if a variable exists
    * Arrays
    * stdClass objects

* Operators
    * Mathematical operations on variables
    * String concatenation
    * Fun with arrays
    * [All Array functions](http://php.net/manual/en/ref.array.php)
    
* Control Structures
    * If-else
    * Nested conditionals
    * switch case
    * Iteration - while, for and foreach
    
* Errors and Error management
    * Compile time, fatal, warning, notices
    * Error reporting i.e. the level of noise
    * Exceptions
    * die() and exit
    * Logging errors

* Configuring PHP
    * Intro to php.ini
    * Setting configuration values at runtime

***

#### Homework 01 - Count Types

[Sample Code](homework/01_count_types.md)

We will be creating a simple program, that can be executed in the [CLI](http://en.wikipedia.org/wiki/Command-line_interface) or in the browser.

Create a function that will count the number of int, float, bool and string data types in a given input string.

The input string contains formatted numbers, and numbers with other formatting characters like exclamation marks.

Words like "true" and "false" are considered to be boolean. The sample code lays out the foundation for you to start work.

If you are not happy with the layout of the sample code, feel free to extract the parts you are happy with and do it your way.

Know that there are multiple ways to solve any given problem, and no two people will solve a problem in exactly the same way.
