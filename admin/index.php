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
        $text = "BAD";
    }

}
else{
    $user = "";
    $pass = "";
}
?>

<html>

<?php

echo $text

?>

<form action="index.php" method="post">
<p>username</p>
<input type="text" name="username" id="">
<p>password</p>
<input type="password" name="password" id="">
<input type="submit" name="submit" id="" value="login">
</form>

</html>
