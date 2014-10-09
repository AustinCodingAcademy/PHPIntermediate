MySQL Fundamentals
==================
>[MySQl](http://www.mysql.com/) is "The world's most popular open source database".
It's fast, secure, scalable, ACID compliant and built to handle high intensity web workloads.
The language of MysQL, and most other databases, is SQL.
SQL is an expressive language that we use to ask the database questions about our data.
Our question is known as a query, and the data we get back is a result set.

***

### Terminology
A database is a collection of tables. A table is a collection of fields that can hold certain kinds of data.
Think of a table as an excel spreadsheet. Each column has a heading, and each row are values for each of those headings.
A table in MySQL has different data types.
Setting the data type and data length on fields will ensure the type data the field can contain.

Here is an example of using ```CREATE TABLE``` to create a new table, if one with the same name doesn't already exist.
```sql
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text,
  `product_price` float(5,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `date_time_added` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
```

Once we have created a table, we can ```INSERT``` some data into it.
```sql
INSERT INTO `product`
    (product_name, product_description, product_price, category, tags, date_time_added)
VALUES
    ("Nike Shox", "Awesome running shoes", 56.99, "Running Shoes", "shoes, running, footwear", NOW());
```

Our product table now contains one record that we can retrieve by issuing a ```SELECT```

```sql
SELECT * FROM product;
```

```
+------------+--------------+-----------------------+---------------+---------------+--------------------------+---------------------+
| product_id | product_name | product_description   | product_price | category      | tags                     | date_time_added     |
+------------+--------------+-----------------------+---------------+---------------+--------------------------+---------------------+
|          1 | Nike Shox    | Awesome running shoes |         56.99 | Running Shoes | shoes, running, footwear | 2014-10-09 13:07:52 |
+------------+--------------+-----------------------+---------------+---------------+--------------------------+---------------------+
```