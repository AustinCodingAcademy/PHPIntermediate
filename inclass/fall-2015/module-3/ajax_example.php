<html>

<head>

</head>

<body>

<?php
$favoritePet = isset($_POST['favoritePet']) ? $_POST['favoritePet'] : null;
?>

<form name="collectDataForm" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">

    <input type="text" name="favoritePet" size="20"
           value="<?php echo($favoritePet); ?>"/>

    <input type="submit" value="Do work!"/>

</form>

<?php

$classMates = array('alex', 'jerry', 'simon', 'samir', 'brian', 'traci', 'jared');

$numClassmates = count($classMates);

$index = rand(0, $numClassmates - 1);

echo $classMates[$index] . ' ' . $favoritePet;
?>

</body>

</html>
