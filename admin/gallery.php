<?php
global $connection;
include '../db.php';
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM `gallery`";
$result = mysqli_query($connection,$sql);

$_POST["asd"] = "asd";

if ($_POST["upload"]){

    $uploaddir = '../gallery/';
    $uploadfile = $uploaddir . basename($_FILES['FileToUpload']['name']);

    move_uploaded_file($_FILES['FileToUpload']['tmp_name'], $uploadfile);

    $filename = basename($_FILES['FileToUpload']['name']);

    $upload_sql = "INSERT INTO `gallery` (`path`) VALUES ('$filename')";

    mysqli_query($connection, $upload_sql);

    header("Location: gallery.php");

}

if ($_POST["delete"]){

    $del_id = $_POST["del_select"];

    $sql_delete = "DELETE FROM `gallery` WHERE id='$del_id'";
    mysqli_query($connection, $sql_delete);

    header("Location: gallery.php");

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
    <div id="admin-header">
        <h1>GALLERY</h1>
        <a href="functions.php">BACK</a>
    </div>
    <div id="admin-panel">
        <?php
        while ($row = mysqli_fetch_array($result)){
        ?>
            <p><?php echo $row["id"]?></p>
            <img style="width: 200px; height: 200px" src="../gallery/<?php echo $row["path"]?>" alt="">
        <?php } ?>
        <h3>UPLOAD IMAGE</h3>

        <form action="gallery.php" method="post" enctype="multipart/form-data">

            <input type="file" name="FileToUpload" id="FileToUpload">
            <input type="submit" name="upload">

        </form>

        <h3>DELETE IMAGE</h3>

        <form action="gallery.php" method="post">
            <select name="del_select" id="">
                <?php
                $sql = "SELECT * FROM `gallery`";
                $result = mysqli_query($connection,$sql);
                while ($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row["id"] ?>"><?php echo $row["id"] ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="delete" id="">
        </form>
    </div>
</body>
</html>
