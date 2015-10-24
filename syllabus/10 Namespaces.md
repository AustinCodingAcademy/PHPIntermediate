10 - Namespaces
===============
> Namespacing is a way for you to organize your code into packages for ease of distribution and reuse and to prevent name collisions. 
> Namespaces are a very important concept and you should master them. All modern object oriented PHP applications leverage namespaces.

Suppose you are building an social network. In order to represent a user you create a class called `User`. 
This seems like a perfectly reasonable thing to do until you use a vendor package that has also defined a class called `User`. 
Now there is no clear way for you to know which `User` class to instantiate.
 
Furthermore, two classes with the same name are not allowed in PHP and will result in a fatal error that looks like this
```bash
Fatal error: Cannot redeclare class User
```

In order to instantiate the user object from the `User` class we would need to `require()` the file where the `User` class is defined. 
This is traditionally done as follows. 
```php
<?php
require("User.php");

$userObj = new User();
```

This solution is not ideal because now you would need to require individual files every time you need to use them. 
The problem is compounded when you need to include classes that are defined by vendors. 
Referencing files in this manner using require is ok for smaller projects or one off scripts. 
If you are developing a large scale application doing things this way is not a good idea! 

When you are working with an application written in modern, object oriented PHP, you are *required* to namespace all your classes. 
Your namespace must match the folder structure that your class lives in. By convention, your class name must be proper cased.
In your symfony project, lets assume you created a folder called `Db`, which contains a class called `Database`, that lives in the following location relative to the root folder.

```bash
src/Aca/Bundle/ShopBundle/Db/Database.php
```

The file must only contain one class called `Database` and must have the following namespace declaration as the first line in the file. 

```php
<?php

namespace Aca\Bundle\ShopBundle\Db;

class Database 
{
    
    // ...
}
```

Now if you are in a controller, you may use this class by referencing it from the aforementioned namespace as such.
```php
<?php

namespace Aca\Bundle\ShopBundle\Controller;

use Aca\Bundle\ShopBundle\Db\Database;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $db = new Database();
    }
}
```

You may also alias the class name, in the event that you have more than one class with the same name. 
```php
<?php
namespace Aca\Bundle\ShopBundle\Controller;

use Aca\Bundle\ShopBundle\Db\Database as AcaDatabase;
use MyVendor\MyPackage\DbStuff\Database as VendorDatabase;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $myDb = new AcaDatabase();
        $vendorDb = new VendorDatabase();
    }
}
```

Namespaces are an essential part of any modern PHP application and use the accepted `PSR-4 Autloading` convention. 

#### How Autoloading works

As we already discussed, when you try to instantiate a class into an object, PHP expects that you `require()` the file that contains the class definition.
If the file is not required, PHP will check to see if any autoloaders are defined. If they are defined, PHP will try to execute them.
Here is an example of this concept in action. 

Coming back to the `Database` class example. If you were not using symfony, or any other PSR-4 compatible framework for that matter, you would have to register an autoloader manually using the `spl_autoload_register()` function
This function accepts a handler as an argument. The handler can either be a `closure` or a `named function` and will accept one argument `$class` which is the class name including any namespace declaration.

```php
<?php

// $class = 'Aca\Bundle\ShopBundle\Db\Database';
spl_autoload_register(function($class){
    
    // Convert the \ to /
    $class = str_replace('\\', '/', $class);
    
    // Append the .php extension and create a file path
    $filePath = $class . '.php';
    
    if (file_exists($filePath)) {
        require($filePath);
    }
});

use Aca\Bundle\ShopBundle\Db\Database;
$db = new Database();
```

So basically whats happening here is you try to instantiate the `Database` class into an object and you have specified that it lives in the following namespace `Aca\Bundle\ShopBundle\Db\Database` by the `use` statement prior to its instantiation.
Since this file has not been required, the registered autloader(s) will be called upon to locate it. The logic within the autoloader can be as sophisticated as necessary to locate the missing class and finally `require()`ing it.

The aforementioned code snippet highlights the necessity for your namespace declaration matching the physical location of your class in the file system. 
If you had your files in a different location than the namespace declaration, your `require()` statement would not work as it stands and would need to be modified to reflect the new non-standard path you chose.

As a rule of thumb your namespace *must* match the physical path of the class and each file *must* contain only one class declaration. The file name *must* be proper cased and *must* match the class name.

Our `Database` class is not very useful at this point. In reality, it's sole purpose would be to talk to MySQL. In order to do that, it would need to know the credentials to the database server. 
It would need to know the `username`, `password`, `host` and `port`. These values could just be hardcoded in the class itself, but that is far from ideal. 
Not only is this bad practice, but it would also make the class unusable when you decide to communicate with different databases that are on different hosts with different credentials. 

The proper way to do this would be to create a number of constructor arguments, for each of these properties, as such
```php
<?php

class Database 
{
    public function __construct($username, $password, $host, $port) 
    {
        // ...
    }

}
```

But whence the values? You will likely have a certain set of credentials on the development environment and another set of credentials for production. 
It is not uncommon for big projects to have several environments viz. `dev`, `qa`, `uat`, `test`, `production` etc...

The subject of discussion in the next module is the way parameters work and, subsequently, how they relate to the service container. 
