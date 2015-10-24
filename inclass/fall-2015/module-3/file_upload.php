<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post"
      enctype="multipart/form-data">

    <input type="text" name="profileName"/>

    <input type="file" name="avatar"/>

    <input type="submit" value="Upload Picture"/>

</form>
<?php

$type = $_FILES['avatar']['type'];
if($type != 'image/jpeg' || $type != 'image/png'){
    die('you can only upload jpg or png');
}

if (move_uploaded_file(
    $_FILES['avatar']['tmp_name'],
    getcwd() . '/' . $_FILES['avatar']['name'])
) {

    echo '<img src="' . $_FILES['avatar']['name'] . '"/>';

} else {
    echo 'File has not moved';
}

echo '<pre>';
echo 'Files:';
print_r($_FILES);

echo '<br/>';

echo 'POST:';
print_r($_POST);
