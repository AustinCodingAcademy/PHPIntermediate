(ACAShop)[https://github.com/AustinCodingAcademy/ACAShop] - Capstone Project Kickoff
=======================
For our capstone project, we will be building an online store called ACAShop.
We have created an implementation, with instructions, in a separate git repo that can be found [here](https://github.com/AustinCodingAcademy/ACAShop).

#### Checkout the code
Execute the following commands on your local machine. These commands will checkout the code and update packages via [composer](https://getcomposer.org/doc/00-intro.md).

- ```mkdir ~/Desktop/htdocs```
- ```sudo ln -s ~/Desktop/htdocs /htdocs```
- ```cd /htdocs```
- ```git clone git@github.com:AustinCodingAcademy/ACAShop.git```
- ```cd ACAShop```
- ```./post_clone.sh```

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