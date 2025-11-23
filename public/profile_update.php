<?php
session_start();

if (isset($_SESSION['name_image_new'])) {
    $name_image_new = $_SESSION['name_image_new'];
}

if (isset($_SESSION['update_data'])) {
    $data_user2 = $_SESSION['update_data'];
}


if (isset($_SESSION['password'])) {
    $passwordr = $_SESSION['password'];
}

if (isset($_SESSION['password_new']))
    $Password_2 = $_SESSION['password_new'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> پروفایل جدید</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>


    <h1 class="h3"> Welcome Profile new <?php echo $data_user2["UserName"]; ?> </h1>

    <div class="div5">
        <div class="div6">
            <div>
                <img src="../image_users/<?= $name_image_new; ?>"
                    class="div7" alt="profile">


            </div>
            <p class="p1"> your name is : <b class="b1">
                    <?php echo $data_user2["UserName"]; ?> </b> </p>
            <p class="p2"> your Email is : <b class="b2">
                    <?php echo $data_user2["Email"]; ?> </b> </p>
            <p class="p3"> your Password is: <b class="b3">
                    <?php echo $Password_2; ?> </b> </p>
            <p class="p4"> your Age is : <b class="b4">
                    <?php echo $data_user2["Age"]; ?> </b> </p>
            <!-- <a class="a2" href="../public/edit_profile.php"> edit profile </a> -->
            <a class="a3" href="../model_crud/delete.php"> delete profile </a>
            <a class="a3" href="../public/login.php">Log Out</a>

        </div>
    </div>

</body>

</html>