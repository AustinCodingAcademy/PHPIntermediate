05 - Design Patterns
=======================
> Now that we are comfortable with Object Oriented Programming, we will take a look at Design Patterns.
> Every piece of software is unique in what it does, there are however, some common patterns that have arisen that aim to solve recurring problems.
> "In software engineering, a design pattern is a general reusable solution to a commonly occurring problem within a given context in software design." -[google](https://www.google.com/#q=design+patterns)-

***

### Widely Used Design Patterns

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
Every time we do that, the mysqli() object that we are assigning to the local protected property $db, makes a socket connection to the MySQL database server.
This can quickly become resource intensive and is a very inefficient way to design an application.
A superior approach would be to make one connection to MySQL and reuse that connection for all queries we issue during one request cycle.
Singleton to the rescue!

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
We have a new private static variable called instance.
We made the constructor private, i.e. nobody should be able to instantiate this class directly.
If client code tries to instantiate the class directly, they would get an error that looks like this
```php
PHP Fatal error:  Call to private DBCommon::__construct() from invalid context in /DBCommon.php on line xxx
```
The only way to instantiate the class, is via a public static method called ```getInstance()```
When getInstance is called, we check if the local static property $instance has been set before.
If the instance property has not been set, then we instantiate the class into an object, set the static property and return it.

* Front Controller
* Model View Controller
