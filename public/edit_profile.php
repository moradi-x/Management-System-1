<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
}
if (isset($_SESSION['error_img'])) {
    echo $_SESSION['error_img'];
    unset($_SESSION['error_img']);
}


$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "System_Users";
try {
    $option = [pdo::ATTR_ERRMODE => pdo::ERRMODE_EXCEPTION, pdo::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_ASSOC];
    $sql = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password, $option);
    $query = $sql->prepare(" select * from `users` where `id` = ? ");
    $query->execute([$id]);
    $data = $query->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_SESSION['email_error'])) {
    echo $_SESSION['email_error'];
    unset($_SESSION['email_error']);
}

if (isset($_SESSION['error password2'])) {
    echo $_SESSION['error password2'];
    unset($_SESSION['error password2']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ادیت پروفایل </title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1 class="h4"> edit profile </h1>

    <div class="div3">
        <div class="div4">
            <form action="../model_crud/update.php" enctype="multipart/form-data" method="post">
                <label for="UserName_r">UserName:</label> <br>
                <input type="text" name="UserName_u" value="<?php echo $data["UserName"] ?>" > <br>

                <label for="Email_u">Email:</label> <br>
                <input type="email" name="Email_u" value="<?php echo $data["Email"] ?>" > <br>

                <label for="Password_u">Password</label> <br>
                <input type="password" name="Password_u" placeholder="please password new..." > <br>
                <p class="p6" > Must be filled out  </p>

                <label for="age_u">age:</label> <br>
                <input type="number" name="age_u" value="<?php echo $data["Age"] ?>" > <br>

                <label for="image_u">image:</label> <br>
                <input type="file" name="image_u" class="image" > <br>
                <div > <img class="div7" src="../image_users/<?php echo $data["Image"]; ?> " alt="photo"> </div> 
                <b class="b0"> Only "jpg" format </b>

                <input type="submit" name="submit_u" value="edit ok ">
            </form>
        </div>
    </div>

</body>
</html>