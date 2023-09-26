<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
require_once('./connection.php');

$id = $_GET["id"];
$sql = "DELETE FROM `std_info` WHERE `id` = '$id'";
$query = mysqli_query($connection, $sql);
mysqli_close($connection);
if(!$query){
    die('Failed');
}else{
?>
    <h1>Delete Record</h1>
    <h1>id <?php echo $id; ?></h1>
    <h2>Successfully!</h2>
    <button type="submit"><a href="./student.php">BACK</a></button>
<?php } ?>
</body>
</html>