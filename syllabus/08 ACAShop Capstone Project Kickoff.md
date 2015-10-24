ACAShop - Capstone Project Kickoff
=======================
For our capstone project, we will be building an online store called ACAShop.
Before we start working on the code for this project, I would like to walk you through the process of setting up the VM.

#### Setup and Configure Infrastructure 

Currently you have been given a VM which responds to requests on `10.10.10.60` or `aca.vm`. 
What we are going to do next is create another hosts entry on your local machine (mac, windows) to point to the same IP with a different alias.
 
Edit the file `/etc/hosts` and add the following entry 
```bash
10.10.10.60     acashop.vm
```

What this is doing is simulating the way DNS works. When you enter in an actual domain name in your browser, a DNS lookup is made effectively translating 
the name into a number. This number is the IP with points to the server of your choosing. In our case, the server happens to be a local virtual machine. 
These instructions are valid for any kind of linux server, even one running on a hypervisor out in the cloud. Amazon's EC2 instances are a good example of a cloud based VM.

The VM has a web server called apache2. When a web request hits your server, apache2 will respond as it is listening on port 80, or 443 if you're running a secure site. 
If a configuration file matching the host header, aka. the domain name, is found, then the directives in said config file will be executed. 
Apache configuration files are located under `/etc/apache2/sites-available/`.
  
SSH into your VM and run the following commands
```bash
cd /etc/apache2/sites-available
```

Create a file called `acashop.conf`
```bash
sudo touch acashop.conf
```

Start editing the file in vim
```bash
sudo vim acashop.conf
```

Paste in the following config
```xml
ServerName acashop.vm
<VirtualHost *:80>
        ServerAlias acashop.vm
        ServerAdmin sameg14@gmail.com
        DocumentRoot /var/www/acashop/web

        <Directory /var/www/acashop/web>
                DirectoryIndex app_dev.php
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                Allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error-acashop.log
        CustomLog ${APACHE_LOG_DIR}/access-acashop.log combined
</VirtualHost>
```

In a nutshell this configuration file tells apache to respond to any requests that match the domain `acashop.vm`. 

Now that you have created the config, you will need to activate the site by issuing the following command
```bash
sudo a2ensite acashop
```

This apache command allows you to enable a particular site's configuration. Restart the webserver to enable the new config
```bash
sudo service apache2 restart
```

Now you should be able to browse to [acashop.vm](http://acashop.vm) in your browser. Or you can issue this command to open the site if your default browser
```bash
open http://acashop.vm
```

#### Install Symfony


#### SQL Schema Reference
Our project will read and write from several different tables. 
The database should be a part of your VM already. 
The SQL that was used to create that schema is included here for your reference.

> [aca_user](sql/aca_user.sql) - [[data]](sql/aca_user-data.sql)

```sql
mysql> describe aca_user;
+---------------------+------------------+------+-----+-------------------+-----------------------------+
| Field               | Type             | Null | Key | Default           | Extra                       |
+---------------------+------------------+------+-----+-------------------+-----------------------------+
| user_id             | int(11) unsigned | NO   | PRI | NULL              | auto_increment              |
| name                | varchar(100)     | YES  |     | NULL              |                             |
| username            | varchar(50)      | YES  |     | NULL              |                             |
| password            | varchar(50)      | YES  |     | NULL              |                             |
| shipping_address_id | int(10) unsigned | YES  |     | NULL              |                             |
| billing_address_id  | int(10) unsigned | YES  |     | NULL              |                             |
| last_login          | timestamp        | YES  |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
+---------------------+------------------+------+-----+-------------------+-----------------------------+
7 rows in set (0.00 sec)
```

> [aca_address](sql/aca_address.sql) - [[data]](sql/aca_address-data.sql)
```sql
mysql> describe aca_address;
+------------+----------------------------+------+-----+-------------------+----------------+
| Field      | Type                       | Null | Key | Default           | Extra          |
+------------+----------------------------+------+-----+-------------------+----------------+
| address_id | int(11) unsigned           | NO   | PRI | NULL              | auto_increment |
| street     | varchar(255)               | YES  |     | NULL              |                |
| city       | varchar(50)                | YES  |     | NULL              |                |
| state      | varchar(5)                 | YES  |     | NULL              |                |
| zip        | int(5)                     | YES  |     | NULL              |                |
| date_added | timestamp                  | YES  |     | CURRENT_TIMESTAMP |                |
+------------+----------------------------+------+-----+-------------------+----------------+
7 rows in set (0.00 sec)
```

> [aca_product](sql/aca_product.sql) - [[data]](sql/aca_product-data.sql)

```sql
mysql> describe aca_product;
+-------------+------------------+------+-----+-------------------+----------------+
| Field       | Type             | Null | Key | Default           | Extra          |
+-------------+------------------+------+-----+-------------------+----------------+
| product_id  | int(11) unsigned | NO   | PRI | NULL              | auto_increment |
| name        | varchar(255)     | YES  |     | NULL              |                |
| description | text             | YES  |     | NULL              |                |
| image       | varchar(255)     | YES  |     | NULL              |                |
| category    | varchar(50)      | YES  |     | NULL              |                |
| price       | decimal(5,2)     | YES  |     | NULL              |                |
| date_added  | timestamp        | YES  |     | CURRENT_TIMESTAMP |                |
+-------------+------------------+------+-----+-------------------+----------------+
6 rows in set (0.00 sec)
```

> [aca_order](sql/aca_order.sql)

```sql
mysql> describe aca_order;
+------------+------------------+------+-----+-------------------+----------------+
| Field      | Type             | Null | Key | Default           | Extra          |
+------------+------------------+------+-----+-------------------+----------------+
| order_id   | int(11) unsigned | NO   | PRI | NULL              | auto_increment |
| user_id    | int(11) unsigned | YES  |     | NULL              |                |
| order_date | timestamp        | YES  |     | CURRENT_TIMESTAMP |                |
+------------+------------------+------+-----+-------------------+----------------+
3 rows in set (0.00 sec)
```

> [aca_order_product](sql/aca_order_product.sql)

```sql
mysql> describe aca_order_product;
+------------------+------------------+------+-----+---------+----------------+
| Field            | Type             | Null | Key | Default | Extra          |
+------------------+------------------+------+-----+---------+----------------+
| order_product_id | int(11) unsigned | NO   | PRI | NULL    | auto_increment |
| order_id         | int(11) unsigned | YES  |     | NULL    |                |
| product_id       | int(11) unsigned | YES  |     | NULL    |                |
| quantity         | int(5) unsigned  | YES  |     | NULL    |                |
| price            | decimal(5,2)     | YES  |     | NULL    |                |
+------------------+------------------+------+-----+---------+----------------+
5 rows in set (0.00 sec)
```