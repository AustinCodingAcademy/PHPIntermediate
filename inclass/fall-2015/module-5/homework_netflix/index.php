<?php
require('NetflixSearch.php');
?>
<html>

<body>
<h3>Netflix Search</h3>
<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
    Title: <input type="text" name="title"/>
    Actor: <input type="text" name="actor"/>
    <input type="submit" value="Search">
</form>

<?php
if(isset($_POST['actor']) || isset($_POST['title'])){
    $title = $_POST['title'];
    $actor = $_POST['actor'];

    // collect title, year, director
    $netflixSearch = new NetflixSearch($actor, $title);
    $searchResults = $netflixSearch->doSearch();

    echo '<pre>';
    print_r($searchResults);
    echo '</pre>';
}

?>

</body>
</html>