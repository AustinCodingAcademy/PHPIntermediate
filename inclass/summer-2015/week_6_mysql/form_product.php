<?php
require('DBCommon.php');

$db = new DBCommon('localhost', 'root', 'root', 'acashop');

// (1)
// Create a form that accepts a product id
// Display that product

// (2)
// Bonus: Create a dropdown that has all product names
// Let the user select the productName
// Display that product, by Id
?>
    <form name="productForm" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">

<!--         Write a query to get this select dropdown. Display product names -->
        <select name="productId">
            <option value=""></option>
            <option value="1">DomoKun</option>
            <option value="3">Painting</option>
        </select>

        <!--    and a submit button -->
        <input type="submit"/>
    </form>

<?php
// Receive the user input and do stuff
if ($_POST) {

    // Get the user's input
    $productId = $_POST['productId'];

    // Validate the input // Write a query
    $query = 'select * from aca_product where product_id = "'
        . $db->quote($productId) . '"';

    $db->setQuery($query);

    // get the result
    $product = $db->loadObject();

    // Display it in html
    if (!empty($product)) {
        echo '<h3>' . $product->name . '</h3>';
        echo '<img src="' . $product->image . '"/>';
    }
}
