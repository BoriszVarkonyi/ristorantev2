<?php
global $connection;
include '../db.php';
session_start();

error_reporting(E_ERROR | E_PARSE);


if ($_POST["submit"]){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $text = "";

    $sql = "SELECT * FROM `users` WHERE `username`='$user' AND `password`='$pass'";

    $res = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($res);

    if ($num > 0){
        $text = "SUCCESFUL";
        $_SESSION["login"] = true;
        header('Location: functions.php');
    }
    else{
        $text = "Incorrect username or password";
    }

}
else{
    $user = "";
    $pass = "";
}
?>

<!DOCTYPE html>
<html lang="be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/normalize.css">
    <link rel="stylesheet" href="./../css/basestyle.css">
    <link rel="stylesheet" href="./../css/adminstyle.css">
    <title>Francesco ADMIN</title>
</head>
<body>
    <div id="admin-header">
        <h1>ADMIN LOGIN</h1>
    </div>
    <form action="index.php" method="post" id="admin-panel">
        <?php echo $text?>
        <p>Username</p>
        <input type="text" name="username" id="">
        <p>Password</p>
        <input type="password" name="password" id="">
        <input type="submit" name="submit" id="" value="login">
    </form>
</body>
</html>
