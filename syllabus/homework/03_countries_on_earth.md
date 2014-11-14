```php
<html>

    <head>
        <title>Countries on Earth</title>
    </head>

    <body>
        
        <h3>Countries on Earth</h3>
        
        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
            Enter Country Name: <input type="text" name="country_name" size="30"/>
            <input type="submit" value="Get Details"/>
        </form>
        
        <hr/>
        
        <?php

        // Check for an incoming POST request
        if ($_POST) {

            $countryName = $_POST['country_name'];

            echo 'The user entered: ' . $countryName;
        }
        ?>

    </body>

</html>
```