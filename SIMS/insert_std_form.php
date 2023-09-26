<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body >
    <?php
    require_once('./connection.php');
    $error = [
        "id" => "",
        "en_name" => "",
        "en_surname" => "",
        "th_name" => "",
        "th_surname" => "",
        "major_code" => "",
        "email" => "",
    ];
    $id = $email = $en_name = $en_surname = $th_name = $th_surname = $major_code = "";

    function protectInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        empty($_POST["id"]) ? $error["id"] = "*Please enter ID Nisit" : $id = protectInput($_POST["id"]);
        if(!empty($_POST["email"])){
            !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? $error["email"] = "*require @" : $email = protectInput($_POST["email"]);
        }
        empty($_POST["en_name"]) ? $error["en_name"] = "*enter en_name" : $en_name = protectInput($_POST["en_name"]);
        empty($_POST["en_surname"]) ? $error["en_surname"] = "*enter en_surname" : $en_surname = protectInput($_POST["en_surname"]);
        empty($_POST["th_name"]) ? $error["th_name"] = "*enter th_name" : $th_name = protectInput($_POST["th_name"]);
        empty($_POST["th_surname"]) ? $error["th_surname"] = "*enter th_surname" : $th_surname = protectInput($_POST["th_surname"]);
        if(!empty($_POST["email"])){
            $major_code = protectInput($_POST["major_code"]);
        }
        if(empty($error["email"]) && empty($error["major_code"]) && !empty($_POST["id"]) && !empty($_POST["en_name"]) && !empty($_POST["en_surname"]) && !empty($_POST["th_name"]) && !empty($_POST["th_surname"])){
            $sql = "INSERT INTO `std_info`(`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES 
            ('$id','$en_name','$en_surname','$th_name','$th_surname','$major_code','$email')";
            $query = mysqli_query($connection, $sql);
            if(!$query){
                $error["id"] = "*ID hasd exists please change ID Nisit";
            }else{
                header("Location: ./insert_std.php");
                exit();
            }
        }
    }
    ?>
    <div>
        <div>
            <h3>Form Insert</h3>
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div style='margin-bottom:10px'>
                        <label for="studentID">ID</label>
                        <?php if ($error["id"]) { ?>
                            <input name="id" type="text" id="studentID">
                            <div><?php echo $error["id"]; ?></div>
                        <?php } else if (!empty($id)) { ?>
                            <input name="id" type="text" id="studentID" value="<?php echo $id; ?>">
                        <?php } else { ?>
                            <input name="id" type="text" id="studentID">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentNameEng">Name (Eng.)</label>
                        <?php if ($error["en_name"]) { ?>
                            <input name="en_name" type="text" id="studentNameEng">
                            <div><?php echo $error["en_name"]; ?></div>
                        <?php } else if (!empty($en_name)) { ?>
                            <input name="en_name" type="text" id="studentNameEng" value="<?php echo $en_name; ?>">
                        <?php } else { ?>
                            <input name="en_name" type="text" id="studentNameEng">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentSurnameEng">Surname (Eng.)</label>
                        <?php if ($error["en_surname"]) { ?>
                            <input name="en_surname" type="text" id="studentSurnameEng">
                            <div><?php echo $error["en_surname"]; ?></div>
                        <?php } else if (!empty($en_surname)) { ?>
                            <input name="en_surname" type="text" id="studentSurnameEng" value="<?php echo $en_surname; ?>">
                        <?php } else { ?>
                            <input name="en_surname" type="text" id="studentSurnameEng">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentNameTh">Name (th.)</label>
                        <?php if ($error["th_name"]) { ?>
                            <input name="th_name" type="text" id="studentNameTh">
                            <div><?php echo $error["th_name"]; ?></div>
                        <?php } else if (!empty($th_name)) { ?>
                            <input name="th_name" type="text" id="studentNameTh" value="<?php echo $th_name; ?>">
                        <?php } else { ?>
                            <input name="th_name" type="text" id="studentNameTh">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentSurnameTh">Surname (th.)</label>
                        <?php if ($error["th_surname"]) { ?>
                            <input name="th_surname" type="text" id="studentSurnameTh">
                            <div><?php echo $error["th_surname"]; ?></div>
                        <?php } else if (!empty($th_surname)) { ?>
                            <input name="th_surname" type="text" id="studentSurnameTh" value="<?php echo $th_surname; ?>">
                        <?php } else { ?>
                            <input name="th_surname" type="text" id="studentSurnameTh">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentMajor">Major Code</label>
                        <?php if ($error["major_code"]) { ?>
                            <input name="major_code" type="text" id="studentMajor">
                            <div><?php echo $error["major_code"]; ?></div>
                        <?php } else if (!empty($major_code)) { ?>
                            <input name="major_code" type="text" id="studentMajor" value="<?php echo $major_code; ?>">
                        <?php } else { ?>
                            <input name="major_code" type="text" id="studentMajor">
                        <?php } ?>
                    </div>
                    <div style='margin-bottom:10px'>
                        <label for="studentEmail">Email</label>
                        <?php if ($error["email"]) { ?>
                            <input name="email" type="text" id="studentEmail">
                            <div><?php echo $error["email"]; ?></div>
                        <?php } else if (!empty($email)) { ?>
                            <input name="email" type="text" id="studentEmail" value="<?php echo $email; ?>">
                        <?php } else { ?>
                            <input name="email" type="text" id="studentEmail">
                        <?php } ?>
                    </div>
                    <button type="submit">SUBMIT</button>
                    <button type="submit"><a href="./student.php">BACK</a></button>
                </form>
            </div>
        </div>
    </div>
    <?php mysqli_close($connection); ?>
</body>

</html>