09 - Composer
=============
> Composer is a popular and widely used package manager for PHP

In order to use composer you will require a composer.json file in the directory you would like to install packages in.
Note that all these commands should be run *after* you SSH into the VM.
 
A sample `composer.json` file looks like this
```json
{
    "name": "myGithubUsername/myGithubRepoName",
    "authors": [
        {
            "name": "Samir Patel",
            "email": "samir@austincodingacademy.com"
        }
    ],
    "require": {
        "facebook/php-sdk-v4": "~5.0"
    }
}
```
The main thing to focus on here are the contents of the ```require``` section. 
In this section you will define all the dependencies you require with a version constraint. 

You can find packages on [Packagist.com](http://packagist.com). 
The ```~``` operator in this case means all packages that are version `5.x.x` but less than `6.0.0`. 
Package versions are created by creatig a git tag with the format `vxMaj.xMin.xPat` 
where `xMaj` is the major version, `xMin` is the minor version and `xPat` is the patch. 
This convention of versioning software is standard across the industry and is explained in detail [here](http://semver.org)

#### Install Composer
If you don't have composer installed on your machine you can run the following command to install it.
```bash
curl -sS https://getcomposer.org/installer | php
```

This command will download a file called `composer.phar` in the same directory. 
A `.phar` file is a PHP executable i.e. it is a standalone PHP application like an `exe` or `app` on windows and a mac respectively. 

You can execute the archive by issuing the following command
```bash
php composer.phar
```

You should see some output that looks like this
```bash
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.0-dev (020e1c214385a986e330f93a29143d7cbd1a677e) 2015-02-10 12:20:43

Usage:
 [options] command [arguments]

Options:
 --help (-h)           Display this help message.
 --quiet (-q)          Do not output any message.
 --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug.
 --version (-V)        Display this application version.
 --ansi                Force ANSI output.
 --no-ansi             Disable ANSI output.
 --no-interaction (-n) Do not ask any interactive question.
 --profile             Display timing and memory usage information
 --working-dir (-d)    If specified, use the given directory as working directory.

Available commands:
 about            Short information about Composer
 archive          Create an archive of this composer package
 browse           Opens the package's repository URL or homepage in your browser.
 clear-cache      Clears composer's internal package cache.
 clearcache       Clears composer's internal package cache.
 config           Set config options
 create-project   Create new project from a package into given directory.
 depends          Shows which packages depend on the given package
 diagnose         Diagnoses the system to identify common errors.
 dump-autoload    Dumps the autoloader
 dumpautoload     Dumps the autoloader
 global           Allows running commands in the global composer dir ($COMPOSER_HOME).
 help             Displays help for a command
 home             Opens the package's repository URL or homepage in your browser.
 info             Show information about packages
 init             Creates a basic composer.json file in current directory.
 install          Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
 licenses         Show information about licenses of dependencies
 list             Lists commands
 remove           Removes a package from the require or require-dev
 require          Adds required packages to your composer.json and installs them
 run-script       Run the scripts defined in composer.json.
 search           Search for packages
 self-update      Updates composer.phar to the latest version.
 selfupdate       Updates composer.phar to the latest version.
 show             Show information about packages
 status           Show a list of locally modified packages
 update           Updates your dependencies to the latest version according to composer.json, and updates the composer.lock file.
 validate         Validates a composer.json
```

Ideally, you want your composer.phar executable to be available systemwide. 
In your VM if you moved an executable to `/usr/local/bin` it will be available systemwide, for the user that you are currently logged in as.

Issue the following command to make composer availble to you systemwide
```bash
mv composer.phar /usr/local/bin/composer
```

Now you can type `composer` anywhere in order to execute the composer application.  

#### Install packages using composer
In order to install the packages mentioned in `composer.json` issue the following command
```bash
composer install -vvv
```

The `-vvv` flag stands for very very verbose. Adding this switch will display detailed output informing you of composer's every move.
Once this process has finished you will observe that a new directory called `vendor` has been created. Inside this folder you should see a PHP file called `autoload.php`

#### Using the package(s)
In order to use your newly installed packages you will need to require this file in your code, as such.

*index.php*
```php
<?php
require('vendor/autoload.php');

// Now use the package(s)
```

In order to use a vendor package it is essential that you understand what namespaces are and how they work. 
Fortunately that is the subject of discussion in the following section.