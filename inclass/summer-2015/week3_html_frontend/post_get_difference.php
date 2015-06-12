<form name="collectDataForm" action="post_get_difference.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="emailAddress"/>

    <br/>

    <input type="radio" name="yesOrNo" value="Yes"/> Yes
    <input type="radio" name="yesOrNo" value="No"/> No
    <input type="radio" name="yesOrNo" value="Maybe SO"/> No

    <br/>

    <input type="checkbox" name="coursesTaken[]" value="PHP"/> PHP
    <input type="checkbox" name="coursesTaken[]" value="MySQL"/> MySQL
    <input type="checkbox" name="coursesTaken[]" value="Python"/> Python

    <br/>

    <select name="animals">
        <option value="Human">Human</option>
        <option value="Monkey">Monkey</option>
        <option value="Goat">Goat</option>
        <option value="Whale">Whale</option>
    </select>

    <br/>


    <input type="file" name="myFile"/>


    <input type="submit"/>
</form>

<?php

echo '<pre>';
echo '<h3>Files</h3>';
print_r($_FILES);
echo '<hr/>';
echo '<pre>';
print_r($_REQUEST);