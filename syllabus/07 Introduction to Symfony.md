Introduction to Symfony
=======================
>Now that we are comfortable with OOP and some design patterns, we will start learning about the [Symfony](http://symfony.com/)` web framework.
>The reason why we are looking at this framework instead of another is because it's modern and has all the features we could ever need. 
>It's fast, easy to set up, supports Composer, MVC, Front Controller, YML Configuration, Service Container, Dependency Injection etc...

***

### Installation
In order to install the framework we are going to need to install composer first. 
[Composer](https://getcomposer.org/) is a dependency manager that we will be using to download [Symfony](http://symfony.com).

#### Install composer
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
At this point you will need to close your terminal and open it up again, then type ```composer```

#### Install Symfony using composer
Symfony can be downloaded and unarchived in the current folder, or you can just use composer to install it. 
```bash
cd /var/www
composer create-project symfony/framework-standard-edition acashop/
```
You will be asked ```Would you like to install Acme demo bundle? [y/N]``` Say ```n```, 
you will then be asked a bunch of other questions, just keep hitting enter till they all go away.

Once everything is done, you will have a newly created folder called ```acashop```.
```bash
cd acashop
```

#### Using Symfony's console
Symfony has a CLI application called ```console```. It is located in the ```app``` folder.
```bash
php app/console
```
As you can see the console is a full featured CLI application that allows us to do many things. One of the first things we are interested in doing is creating a ```bundle``` 
You can think of a bundle as being a unit of code, and configuration that contains an application that lives within the Symfony framework. 

#### Create our bundle
We are going to create a bundle that will contain all the routes and code for our application *ACAShop*
```bash
php app/console generate:bundle
```

You will then be directed to answer a series of questions:
- Bundle namespace: ```ACA\ShopBundle```
- Bundle name [ACAShopBundle]: ```Hit enter```
- Target directory [/var/www/acashop/src]: ```Hit enter```
- Configuration format (yml, xml, php, or annotation): ```yml```
- Do you want to generate the whole directory structure [no]? ```yes```
- Do you confirm generation [yes]? ```Hit enter```
- Confirm automatic update of your Kernel [yes]? ```Hit enter```
- Confirm automatic update of the Routing [yes]? ``Hit enter```

Once you are done with this, your directory should look like this:
![ACAShopBundle](../images/acashop_bundle.png "Bundle")

#### Routing
Any website that you visit will have a home page and some other pages that may be static content or contain some interface that you can interact with. 
The various pages on a website can be accessed by ```routes```. Routing is the process of creating such routes.

Open up your browser and view our newly created site by visiting ```http://10.10.10.10/acashop/web/app_dev.php```

### Framework Fundamentals
* Routing
* Creating controller actions
* Templating using twig
* PSR4 autoloading and namespacing conventions
* Dependency Injection
* MVC architecture

### Databases
* MySQL primer on SELECT, INSERT, UPDATE, DELETE queries
* Specifying criteria with WHERE clause
* Fetching related data using JOIN
* Limiting the number of results returned 
* Creating a custom database helper class
