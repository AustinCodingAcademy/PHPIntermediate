05 - Design Patterns
=======================
> Now that we are comfortable with Object Oriented Programming, we will take a look at Design Patterns.
> Every piece of software is unique in what it does, there are however, some common patterns that have arisen that aim to solve recurring problems.
> "In software engineering, a design pattern is a general reusable solution to a commonly occurring problem within a given context in software design." -[google](https://www.google.com/#q=design+patterns)-

***

#### Factory
A factory is a class that creates objects for the wider application to consume. The output of the method is an object, with all its dependencies met.
Think of this pattern as an actual factory that makes cars. Lots of inputs are required to make a vehicle, but the output, is just a car.
The whole point of a factory is to provide it with the minimum amount of knowledge it needs to create a complicating object.

```php
// Create a car by calling a static method on CarFactory called getCar.
// This method takes two arguments, the make and model of the car you want the factory to build.
$ToyotaCorolla = CarFactory::getCar($make='toyota', $model='corolla');

// Object now has complex data
$ToyotaCorolla->getTorque(); // returns 128 lb·ft @ 4,400 rpm (174 N·m)
$ToyotaCorolla->getHeight(); // returns 57 inches

// Object can also have complex behavior
$ToyotaCorolla->rollUpWindows();
$ToyotaCorolla->setSpeed(65)->setDestination->('Austin')->setDriver('autopilot')->drive();
```

#### Singleton
A Singleton is a pattern that we should use when we want to ensure that there is only one instance of our class instantiated during the entire request cycle.
A great example of singleton in action is a DB class that connects a database and contains functionality to perform [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) operations.

Lets create such a class.
```php
/**
 * Class DBCommon without a singleton pattern applied
 */
class DBCommon
{
    /**
     * Database connection
     *
     * @var resource
     */
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(
            $host = 'localhost', $username = 'user', $password = 'pass123',
            $databaseName = 'acadb', $port = 3306
        );
    }

    public function query($sql)
    {
        // Run the actual query and return results...
    }
}
```

Here is how client code will use our class
```php
<?php

$DB = new DBCommon();
$DB->query('select * from user');

// If I wanted to run another query in some other method, I would have to instantiate the class again
$DB = new DBCommon();
$DB->query('select * from order');
```
As you can see, we will have to instantiate the DBCommon class every single time we need to run a query.
Every time we do that, the ```mysqli()``` class that we are assigning to the local protected property ```$db```, makes a socket connection to the MySQL database server.
This can quickly become resource intensive and is a very inefficient way to design an application.
A superior approach would be to make one connection to MySQL and reuse that connection for all queries we issue during the lifecycle of the request.

Let's take a look at how we can use Singleton to solve this particular problem.
```php
<?php

/**
 * Class DBCommon with private constructor and singleton pattern applied
 */
class DBCommon
{
    /**
     * Static instance of the instantiated object
     *
     * @var DBCommon
     */
    private static $instance;

    private function __construct()
    {
        $this->db = new mysqli(
            $host = 'localhost', $username = 'user', $password = 'pass123',
            $databaseName = 'acadb', $port = 3306
        );
    }

    /**
     * Get a singleton instance of DBCommon
     *
     * @return DBCommon
     */
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        // Run the actual query and return results...
    }
}
```
We have a new ```private static``` variable called ```$instance```.
We made the constructor private, i.e. nobody should be able to instantiate this class directly.
If client code tries to instantiate the class directly, they would get an error that looks like this
```php
PHP Fatal error:  Call to private DBCommon::__construct() from invalid context in /DBCommon.php on line xxx
```
The only way to instantiate the class, is via a ```public static``` method called ```getInstance()```.
When ```getInstance()``` is called, we check if the local static property ```$instance``` has been previously set.
If the instance property has not been set, then we instantiate the class, set the static property and return it.
Note that we can instantiate a class from within ```getInstance()``` even though the constructor is private
because we are calling it from inside the class and not from the outside.

Here is how client code will use our redesigned class.
```php
<?php

// Instantiate via getInstance using Singleton pattern
$DB = DBCommon::getInstance();
$DB->query('select * from user');

// Same object returned, mysqli() is not called twice!
$DB2 = DBCommon::getInstance();
$DB2->query('select foo from bar');
```

### Front Controller
A front controller is a pattern that enables your application to have a single point of entry.
All the URLs and their associated parameters are rewritten by the webserver and handed off to one .php file for processing.
For example:
```
Url with no rewriting: http://foo.com/bar.php
Url with rewriting: http://foo.com/bar
```
Notice in the second example, we have no .php because /bar is an alias we generated.
[Apache](http://httpd.apache.org/) has a module called [mod_rewrite](http://httpd.apache.org/docs/current/mod/mod_rewrite.html) that allows you to perform this neat trick.

This is an example of an apache configuration snippet that redirects all URL patterns on your domain to ```index.php```
```bash
<IfModule mod_rewrite.c>
    RewriteEngine on
    RewriteRule    (.*) index.php    [L]
</IfModule>
```

The purpose of a front controller is to reduce the number of PHP files we create and to route all requests through one script.
Here is how we would implement a rudimentary front controller.
```php
<?php

// Ternary expression enables us to set a default value for $url if PATH_INFO is not set
$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 'homepage';

//Trim out leading slash from the path
$url = ltrim($url, '/');

//Evaluate known patterns
switch ($url) {

    case 'homepage':
        echo 'Show Homepage';
        break;

    case 'products':
        echo 'Show products';
        break;

    case 'blog':
        echo 'Show Blog';
        break;

    default:
        echo '404 Page not found!';
}
```

### Model View Controller
MVC is one of the most widely accepted ways of separating our application.
* M - Model
* V - View
* C - Controller

A request comes in from the web, probably using front controller and hits a PHP class called a controller.

The controller's sole responsibility is to acquire data from the request via ```$_GET``` or ```$_POST``` parameters
and to instantiate any classes that are responsible for responding to that request.
The controller also calls methods on model classes to get data, that handler objects will need to fulfill the request.
Finally, the controller will hand off or assign the data returned from handler classes to a view class for rendering.

View classes simply take data from the controller, figure out which template to render, assign the data to the template and generate some HTML.

Model classes are responsible for modelling your database and all the relationships contained therein.
Models should not contain any kind of business logic, and should only retrieve and persist data from and to the database respectively.