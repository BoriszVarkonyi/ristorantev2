<?php
global $connection;
include '../db.php';
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM `gallery`";
$result = mysqli_query($connection,$sql);

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
<h3>IMAGES</h3>
<?php ?>

<h3>UPLOAD IMAGE</h3>

<h3>DELETE IMAGE</h3>
<a href="functions.php">BACK</a>
</body>
</html>
