<?php
global $connection;
include '../db.php';

$sql = "SELECT * FROM categories";

$result = mysqli_query($connection, $sql);

?>

<html>
<h1>MENU CATEGORIES</h1>
<ul>
    <?php

    while ($row = mysqli_fetch_array($result)){

    ?>
    <li><?php echo $row["cat_name"]?></li>
    <?php
    }
    ?>
</ul>

</html>
