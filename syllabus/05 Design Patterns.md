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

* Singleton
* Front Controller
* Model View Controller
