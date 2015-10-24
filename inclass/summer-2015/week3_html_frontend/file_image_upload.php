<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"
      enctype="multipart/form-data">

    <input type="file" name="myImage"/>
    <input type="submit"/>

</form>
<?php

$currentFolder = getcwd();

if(isset($_FILES['myImage'])){

    $file = $_FILES['myImage'];

    if (move_uploaded_file($file['tmp_name'], $currentFolder . '/' . $file['name'])) {

        echo '<br/>';
        echo '<img src="' . $file['name'] . '"/>';
    } else {
        echo 'File did not upload';
    }
}
