<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body >
<?php require_once('./connection.php'); ?>
    <div>
        <table border="1" style='margin-left:auto;margin-right:auto;'>
            <thead>
                <th>#</th>
                <th>ID</th>
                <th>Name (Eng.)</th>
                <th>Surname (Eng.)</th>
                <th>Name (th.)</th>
                <th>Surname (th.)</th>
                <th>Major Code</th>
                <th>Email</th>
                <th>Delete</th>
                <th>Edit</th>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT `id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email` FROM `std_info`";
                    $query = mysqli_query($connection, $sql);
                    if(!$query){
                        die('เกิดข้อผิดพลาดในการแสดงข้อมูล');
                    }else{
                        $index = 1;
                        while($result = mysqli_fetch_object($query)){
                ?>
                        <tr>
                            <th><?php echo $index ?></th>
                            <td><?php echo $result->id ?></td>
                            <td><?php echo $result->en_name ?></td>
                            <td><?php echo $result->en_surname ?></td>
                            <td><?php echo $result->th_name ?></td>
                            <td><?php echo $result->th_surname ?></td>
                            <td><?php echo $result->major_code ?></td>
                            <td><?php echo $result->email ?></td>
                            <td><a href="./delete_std.php?id=<?php echo $result->id ?>"><button type='submit'>delete</button></a></td>
                            <td><a href="./update_std_form.php?id=<?php echo $result->id ?>"><button type='submit'>Edit</button></a></td>
                            
                        </tr>
                <?php ++$index; } } ?>
            </tbody>
        </table>
        <div><a href="insert_std_form.php" class="btn btn-success"  style='margin-left:24%;'>Insert new record</a></div>
    </div>
    <?php mysqli_close($connection); ?>
</body>
</html>
