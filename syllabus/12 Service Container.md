12 - Service Container
======================

> The service container is a tool that lets you centrally manage all of the objects your application needs to instantiate and also allows you to 
satisfy any dependencies that your objects may have. An object may depend on a value e.g. username, password etc... or another object that may have it's own dependencies. 

The Service Container is a very important concept in building amazing web applications that can be reused, replaced, modified and tested with confidence. 
It is of the utmost importance that you get this concept. Do not skip this module until you fully understand everything there is to know about the service container. 
Everything we will be building from here on out will be a service. Aside from using the Service Container, there is just no other good way to manage dependencies.

The first thing you may wonder is what a dependency is? A dependency is simply a constructor or method argument. 

Lets consider the example of the `Database` class from the previous module. 
```php
<?php

namespace Aca\Bundle\ShopBundle\Db;

class Database
{
    public function __construct($username, $password, $host, $port)
    {
        // ...
    }
}
```
The problem was that we needed some configuration parameters from the particular environment, that we are running our application on, to be passed in as constructor arguments.
 
We could acquire the values from the parameters file as such, and satisfy the constructor dependencies in the method that needs the object
```php
<?php

namespace Aca\Bundle\ShopBundle\Controller;

use Aca\Bundle\ShopBundle\Db\Database;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
@todo: add example of getting params directly from the params file in the controller
**/
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $db = new Database();
    }
}
```

Now this might be a viable solution in the short term, but as your controller's action methods increase, it is quite likely that you will need to do this work again. 
Furthermore, your class may even depend on other objects, which may have their own dependencies. In order to spare yourself from this reality of dependency hell, you will need to master the service container. 

#### Creating a service
The container is defined in a file called `services.yml` located in the following path `Aca\Bundle\ShopBundle\Resources\config\services.yml`
This is how we would define the `Database` class as a service.
```yml
services:
    my-db:
        class: Aca\Bundle\ShopBundle\Db\Database
        arguments: [%database_user%, %database_password%, %database_host%, %database_port%]
```

`my-db` is the name of the service that you will use to retrieve the fully instantiated object.
`class: Aca\Bundle\ShopBundle\Db\Database` defines the fully qualified namespaced location of the class in question
`arguments: [%database_user%, %database_password%, %database_host%, %database_port%]` are the constructor arguments that this class requires. 
The `%%` notation is used to reference a scalar value from the appropriate parameter file.

#### Using a service
All services in the container are defined as singletons. You can request a service from the container as many times as you like, and the class will only be instantiated once. 
Here is how you would use the newly created service instead of instantiating the object manually
```php
<?php

namespace Aca\Bundle\ShopBundle\Controller;

use Aca\Bundle\ShopBundle\Db\Database;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $db = $this->get('my-db');
    }
}
```

This is a nifty solution to our problem but it still doesnt solve another important use case. Consider the example of a `User` class. 
Typically a user is represented as a row in a table somewhere in the database, lets assume that table is called `users`. 
When we need to create a new user, or retrieve an existing one, we would need to talk to the database and create or fetch the appropriate record. 
We have a service in the container that knows how to talk to the database already, what we really need is for that service to get injected into our `User` class whenever it is requested.

This is what our `User` class could look like 
```php
<?php

class User
{
    /**
     * Database connector
     * @var Database
     */
    protected $db;
    
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    
    /**
     * Get one user row from MySQL
     * @param int $userId PK for this user
     * @return array
     */
    public function getOneUserRow($userId)
    {
        $query = 'select * from user where id = "' . $userId . '"';
        return $this->db->fetchRow($query);
    }
}
```

If we added the `User` to the service container, we could inject the dependency in the container itself, as such

```yml
services:
    my-db:
        class: Aca\Bundle\ShopBundle\Db\Database
        arguments: [%database_user%, %database_password%, %database_host%, %database_port%]
    
    user:
        class: Aca\Bundle]ShopBundle\Models\User
        arguments: [@my-db]
```

By using the `@` notation we indicate that the `User` class has one dependency and it is another service named `my-db`

Now if you wanted to use the `User` object, with all its dependencies met in a controller, you would do it as such
```php
<?php

namespace Aca\Bundle\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $user = $this->get('user');
        
        $userId = 123;
        $userRow = $user->getOneUserRow($userId);
        
        print_r($userRow);
        die();
    }
}
```

It is best practice to create and manage all objects and their respective dependencies in the service container. 
If you ever needed to add or remove a dependency, you would do it in the container and wouldn't have to worry about changing all the other code that would otherwise manually instantiate your class into an object.
Furthermore, the container will return objects as singleton references which will give you a bit of a performance boost depending on your unique situation. 

Now that you have understood the container, every class you write *must* be in the container, with a few exceptions. 
In some situations you have have a utility class of some kind that has a bunch of static methods. 
If there is no real need to instantiate a class to use it's functionality, it doesn't belong in the container. 
In all other cases, you should strongly consider creating an entry in the container for your specific class. 