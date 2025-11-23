<?php
require_once '../model_crud/database.php';
// require_once '../model_crud/table.php';

session_start();

$email = $_POST['serch'];

if (empty($email)) {
    $_SESSION['error_e'] = "please email users...";
    header("location:./admin.php");
    exit();
}


$query4 = $sql->prepare(" select * from `users`  where `Email` = ? ");
$query4->execute([$email]);
$data_user = $query4->fetch();

if (!$data_user) {
    $_SESSION['error_serch'] = " dont user no ok email... ";
    header("location:.admin.php");
    exit();
}
// var_dump($data_user);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سرچ کاربر </title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1 class="hl" > serching user... </h1>
    <div class="div11">
        <div class="div12">
            <div class="div7">
                <img src="../image_users/<?php echo $data_user["Image"]; ?>" class="" alt="profile">
            </div>
            <p class="p1"> your name is : <b class="b1">
                    <?php echo $data_user["UserName"]; ?> </b> </p>
            <p class="p2"> your Email is : <b class="b2">
                    <?php echo $data_user["Email"]; ?> </b> </p>
            <p class="p4"> your age is : <b class="b4">
                    <?php echo $data_user["Age"]; ?> </b> </p>
               <a href="../admin/admin.php" class="al" >Back</a>

        </div>
    </div>
</body>

</html>