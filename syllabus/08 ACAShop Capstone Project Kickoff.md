ACAShop - Capstone Project Kickoff
=======================
For our capstone project, we will be building an online store called ACAShop. 
Modern online shoppers have come to expect a certain experience. 
Here are some of the features we expect our store to have to keep those hard to please shoppers happy: 

#### Home Page
- We will be using [bootstrap](http://getbootstrap.com/) to layout our ```base.html.twig``` template
- Create a navigation menu that contains a few links:
    - ```/``` that is a link to the home page, 
    - ```/catalog``` which is a link to our product catalog and 
    - ```/cart``` that will show all the items that the user has added to their cart
- Create a username and password login box, complete with a route that will handle user authentication
- We will need a corresponding ```User``` class that will inform the client if the user is valid  
i.e. in the database or not using a public method called ```isValid()```

#### Admin Area
- Create a route called ```/admin``` and map it to ```AdminController::indexAction()``` also create a corresponding default template
- The admin area is not secured, neither does it have any special navigation, all we want this to do is allow the admin to add a new product 
- The fields that we need in order to add a new product are ```name```, ```category```, ```price```, ```picture```
- Create a table called ```product``` with the corresponding fields contained on the form
- Allow for the admin to upload a product image, which will get stored in a folder on the server
- Store the relative location of the image in the ```product.picture``` field e.g ```images/products/baseball-bat.png```

#### Product listing
- Create a controller called ```ProductController``` with a default ```indexAction()``` that maps to a ```templates/Product/index.html.twig``` template
- Write a query to get all products from the database, return an array of ```Product```objects and hand those off to the template
- Loop through the results, in the template and display your products with an add to cart button 
- We will need a route ```add_cart``` and a controller ```CartController::addCartAction()``` to handle the adding of products to the user's shopping cart
- When the user adds an item, the items should be stored in session. All you need to store is the ```product_id``` and the ```quantity``` 

#### Shopping Cart
- The shopping cart should show all the items that the user has added to the cart
- If there are no items in the cart, display a message to that effect
- Allow the user to update the quantity of each item
- Allow the user to remove an item from their cart
- Create a **Checkout** button that maps to a route called ```/checkout```

#### Checkout
- For the checkout page lets create a controller called ```CheckoutController```
- Display two HTML forms with a shipping address and a billing address
- We are not going to collect any form of payment information
- Display the order total on the checkout page
- Create a button called **Place Order** which will map to a route called ```/place_order```
- If the ```user.shipping_address_id``` field is filled, call the ```Address``` class with this Id as the constructor argument, set the ```address_type``` to *shipping* 
- Same concept applies for ```user.billing_address_id```

#### Place Order
- Create a controller called ```OrderController``` and a method called ```placeOrderAction()```
- The ```placeOrderAction()``` method will give the ```Order``` class the ```Product[]``` i.e. the ```Product``` array
- Create an ```Address``` class, and create a table called ```address```  
- The address table and the class will contain a ```address_type``` field, whose values are ```shipping``` or ```billing```
- Ensure that the shipping and billing options in the table are ```ENUM``` instead of just ```varchar``` or ```char``` values
- Create a record in the address table, store the ```address``` & ```address_type``` as ```shipping``` retrieve the ID of that record, 
- Store the Id in ```user.shipping_address_id``` for later retrieval if the user placed another order in the future 
- The same concept applies to billing address
- Write order data to the ```order``` table, retrieve the newly created ```order_id``` 
- Create one record per ```Product``` in the ```order_item``` table

### Reporting
- Create a report to show all sales that were made by all people to date
- The report should rollup and show total sales
- Create a filter to allow the user to query a certain date range

#### Footnotes
- You can either be a lone ranger and work on it yourself, or you can pair up with another person.
- If you do choose to pair up, we can help you structure your work so its more atomic and create a shared git branch
- All table names *should* be singular, unless you have a good reason to them it plural
- All your code *should* be on a branch
- Make small, frequent and meaningful commits
- Push changes to GitHub frequently so everyone can see your work; we don't like keeping secrets
- You are *required* to **document every method you write** using PHP PSR DocBloc conventions


#### Tables

> [aca_user](sql/aca_user.sql) [Data](sql/aca_user-data.sql)

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

> [aca_address](sql/aca_address.sql) [Data](sql/aca_address-data.sql)
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

> [aca_product](sql/aca_product.sql) [Data](sql/aca_product-data.sql)

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