<?php

session_start();

if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

if (isset($_SESSION['data'])) {
    $data_user1 = $_SESSION['data'];
}

if (isset($_SESSION['name_image2'])) {
    $name_imager = $_SESSION['name_image2'];
}

if (isset($_SESSION['password'])) {
    $passwordr = $_SESSION['password'];
}

// echo "<pre>" ;
// var_dump($_SESSION['data']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> پروفایل</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>


    <h1 class="h3"> Welcome Profile <?php echo $data_user1["UserName"]; ?> </h1>

    <div class="div5">
        <div class="div6">
            <div>
                <img src="../image_users/<?php echo $name_imager; ?>"
                    class="div7" alt="profile">
            </div>
            <p class="p1"> your name is : <b class="b1">
                    <?php echo $data_user1["UserName"]; ?> </b> </p>
            <p class="p2"> your Email is : <b class="b2">
                    <?php echo $data_user1["Email"]; ?> </b> </p>
            <p class="p3"> your Password is: <b class="b3">
                    <?php echo $passwordr; ?> </b> </p>
            <p class="p4"> your age is : <b class="b4">
                    <?php echo $data_user1["Age"]; ?> </b> </p>
            <a class="a2" href="../public/edit_profile.php"> edit profile </a>
            <a class="a3" href="../model_crud/delete.php"> delete profile </a>
            <a class="a3" href="../public/login.php">Log Out</a>
        </div>
    </div>

</body>

</html>