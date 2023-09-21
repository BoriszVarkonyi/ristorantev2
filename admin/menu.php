<?php
global $connection;
include '../db.php';
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM `items`";
$result = mysqli_query($connection, $sql);

$sql_cat = "SELECT * FROM `categories`";
$result_cat = mysqli_query($connection, $sql_cat);

//Adding menu item
if ($_POST["add_item"]){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $cat = $_POST["category"];

    //Line for checking variable values
    //echo $name . $price . $cat;

    $sql_insert = "INSERT INTO `items` (`item_name`, `item_price`, `cat_id`) VALUES ('$name', '$price', '$cat')";

    mysqli_query($connection, $sql_insert);

    header('Location: menu.php');

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>MENU ITEMS</h1>

<ul>
    <?php
    while ($row = mysqli_fetch_array($result)){
        ?>
        <li><p><?php echo $row["item_name"]?></p><p><?php echo $row["item_price"] . " euro"?></p><p><?php echo "CAT-ID: " . $row["cat_id"]?></p></li>
    <?php } ?>
</ul>

<h3>ADD MENU ITEM</h3>

<form action="menu.php" method="post">
    <p>item name</p>
    <input type="text" name="name" id="">
    <p>item price</p>
    <input type="number" name="price" id="">€
    <p>select category</p>
    <select name="category" id="">
        <?php
        while ($row = mysqli_fetch_array($result_cat)){
        ?>
        <option value="<?php echo $row["id"]?>"><?php echo $row["cat_name"]?></option>
        <?php
        }
        ?>
    </select>
    <input type="submit" name="add_item">
</form>

</body>
</html>