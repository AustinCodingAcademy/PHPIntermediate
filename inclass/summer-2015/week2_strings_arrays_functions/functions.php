<form action="functions.php" method="post">
    First Name: <input type="text" name="firstName"/>
    <input type="submit"/>
</form>

<?php


//$_GET; // when you want to get things from the URL
//
//$_POST; // when you want to get things from a form that was submitted
//
//$_REQUEST; // when you want to get either of those things

// Collect the user input
//if (isset($_POST['firstName'])) {
//    $enteredName = $_POST['firstName'];
//} else {
//    $enteredName = ' nobody';
//}

// ternary
$enteredName = isset($_POST['firstName']) ? $_POST['firstName'] : null;


// Pass it into the function i.e. call the function
$functionOutput = sayHello($enteredName);

// Collect the return data from the function
// $functionOutput contains the data from the function

// Output the result from the function
echo '<h3>' . $functionOutput . '</h3>';

/**asd
 * @param string $name This is the name they enter on the FE
 * @see http://www.php-fig.org/
 * @return string
 */
function sayHello($name)
{
    return 'Hello ' . $name;
}