11 - Environments and Configuration
===================================
> An environment is a server, or a cluster of servers, that runs your application when a request is made. 
> Since each environment serves a different purpose it is quite likely that it will also require a separate set of configuration options

When you develop your app locally on a VM, the settings you will use for things like database credentials will likely be different from when you are serving requests from a production server. 
Symfony provides us with an elegant way to manage multiple environments. 

In order to understand how all this is wired up we will need to start with the first responder, `apache2`. 
When you type in a domain name (austincodingacademy.com) in your browser the following things happen
- DNS is contacted through your ISP and receives the domain name as a query
- It will respond to the query by locating an `A` record for the domain
- An A record contains the IP address to a server
- The IP is returned to the client and the server is contacted over port `80`
- Apache is a piece of software running on the server, effectively making it behave as a web server
- Apache will check if there is an appropriate `.conf` file defined for the aforementioned domain
- If a config file is found, the directory that it references will contain a PHP file to execute
- On dev this file is typically `web/app_dev.php` and on production it is `web/app.php`

If you opened up app_dev.php in your IDE you will see some code including the following line
```php
$kernel = new AppKernel('dev', true);
```

The `AppKernel` class is the main handler for your code and accepts two arguments, `dev` and `true`. 
The first argument is the environment i.e. `$environment = dev` and the second is a debug switch i.e. `$debug = true`

Now open up the file `app.php` and locate the same `AppKernel` line, you will see this instead
```php
$kernel = new AppKernel('prod', false);
```

On each one of your servers you will have an apache config to handle the incoming request. 
Here is an example config
```xml
ServerName austincodindacademy.com
<VirtualHost *:80>
        ServerAlias austincodindacademy.com
        ServerAdmin samir@austincodindacademy.com
        DocumentRoot /var/www/aca/web

        <Directory /var/www/aca/web>
                DirectoryIndex app.php
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                Allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error-aca.log
        CustomLog ${APACHE_LOG_DIR}/access-aca.log combined
</VirtualHost>
```

Focus on the line `DirectoryIndex app.php`. 
What this configuration directive is saying is that if an incoming request's host header matches `austincodingacademy.com`, 
assign the file `/var/www/aca/web/app.php` as the code that will handle the incoming request and return a response. 
 
As we have already seen, it is the `app.php` file that defines an environment as a constructor argument to `AppKernel`

If you want to create a new environment you can create a new file called `app_test.php` and in your test apache config you can set `DirectoryIndex app_test.php` with the following `$kernel = new AppKernel('test', true);` 

#### Configuration files
Now that we understand how environments work, lets take a closer look at the parameter and config files

Under `app/config` you should find a number of configuration files and parameter files. 
By default the `config.yml` file will get loaded. This file imports the `parameters.yml` file. This is the default state of things. If you were to look at this directory closely you will notice that there is a file called `parameters.yml.dist`. 
This dist file is a distribution file and should contain some sane defaults. When `composer install` is run, the contents of the `.dist` file are copied into a file called `parameters.yml` and you are given the option to manually override a particular value, or use the provided default. 
When you are in the dev environment, the `config_dev.yml` file will get loaded. If you were to inspect the contents of this file, you will notice that it imports `parameters_dev.yml`. 

In this fashion you can specify values in `parameters.yml`, and override them in the environment specific files. 
If a value has not been overridden in the environment specific file, then the parent value will be used viz. the `parameters.yml` value.  

Coming back to our `Database` class example, we have to still figure out how to pass the values, that are defined in these configuration files, to the constructor of our class. 
This will be the topic of the subsequent module as we explore the Service Container. The thorough understanding of the container is tantamount to building world class applications that will stand the test of time. 