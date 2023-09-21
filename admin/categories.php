<?php
global $connection;
include '../db.php';
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM categories";

$result = mysqli_query($connection, $sql);

//Logic for adding new category
if ($_POST["add_cat"]){
    $name = $_POST["name"];
    if ($name != ""){
        $sql_create_cat = "INSERT INTO `categories` (`cat_name`) VALUES ('$name')";
        mysqli_query($connection, $sql_create_cat);
        header("Location: categories.php");
    }
}
//Logic for deleting category and it's items
if ($_POST["delete_submit"]){

    $cat_to_delete = $_POST["cat_delete"];

    $cat_del_sql = "DELETE FROM `categories` WHERE id='$cat_to_delete'";

    mysqli_query($connection, $cat_del_sql);

    $item_del_sql = "DELETE FROM `items` WHERE cat_id='$cat_to_delete'";

    mysqli_query($connection, $item_del_sql);

    header("Location: categories.php");

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/normalize.css">
    <link rel="stylesheet" href="./../css/basestyle.css">
    <link rel="stylesheet" href="./../css/adminstyle.css">
    <title>Francesco ADMIN</title>
</head>
<body>
    <div>
        <h1>MENU CATEGORIES</h1>
        <a href="functions.php">BACK</a>
    </div>
    <div id="admin-panel">
        <ul>
            <?php

            while ($row = mysqli_fetch_array($result)){

                ?>
                <li><?php echo $row["cat_name"]?></li>
                <?php
            }
            ?>
        </ul>

        <h3>Add menu category</h3>
        <form action="categories.php" method="post">
            <input type="text" name="name" id="">
            <input type="submit" name="add_cat">
        </form>

        <h3>DELETE CATEGORY AND ALL OF IT'S ITEMS</h3>

        <form action="categories.php" method="post">

            <select name="cat_delete" id="">
                <?php

                $sql = "SELECT * FROM categories";

                $result = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_array($result)){

                ?>
                <option value="<?php echo $row["id"]?>"><?php echo $row["cat_name"]?></option>
                <?php } ?>
            </select>
            <input type="submit" name="delete_submit" value="Delete">

        </form>
    </div>
</body>
</html>
