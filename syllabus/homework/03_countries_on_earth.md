##### Homework 03 - Countries on Earth

As an ongoing effort to understand more about the earth we inhabit, we are being asked to build a single page web application that will help people explore countries.
 
The application will consist of a search bar that will allow the user to enter a name of a country. 

You will then write some code that will make an API call out to this endpoint with the name of country, ```http://restcountries.eu/rest/v1/name/Mongolia```

You can get data from a URL using the ```file_get_contents()``` PHP method. The API will give you data back in JSON. 

You may use ```json_decode()``` to decode this data into an array. 

Once your data has been decoded, display the following details about the country:
- Country Name
- Capital
- Region
- Population (use ```number_format()``` to format this)
- A comma separated list of all the languages spoken here

As a bonus, you may add some styling to your app to make it look aesthetically pleasing

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
            
            // Hint: To access data in a stdClass object use the -> operator
            // $data->name = 'Samir'; echo $data->name;
        }
        ?>

    </body>

</html>
```