```php
<html>

    <head>
        <title>Countries on Earth</title>
    </head>

    <body>

        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
            Enter Country Name: <input type="text" name="country_name" size="30"/>
            <input type="submit" value="Get Details"/>
        </form>
        <hr/>
        <?php

        // Check for an incoming POST request
        if (isset($_POST)) {

            $countryName = $_POST['country_name'];

            echo 'The user entered: ' . $countryName;
        }
        ?>

    </body>

</html>
```