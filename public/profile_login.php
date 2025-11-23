<?php
session_start();

$userid="";
if(isset($_SESSION['user_id'])){
    $userid = $_SESSION['user_id'];

}

// var_dump($userid);
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "System_Users";
try {
    $option = [pdo::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION,pdo::ATTR_DEFAULT_FETCH_MODE=>pdo::FETCH_ASSOC];
    $sql = new PDO ("mysql:host=$localhost;dbname=$dbname",$username,$password,$option);
    $query = $sql->prepare(" select * from `users` where `id` = ? ") ;
    $query->execute([$userid]);
    $data_user1 = $query->fetch();
    $_SESSION['data'] = $data_user1;

} catch (PDOException $e) {
    echo $e->getMessage();
}

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


    <h1 class="h3"> Welcome Profile <?php echo $data_user1["UserName"];?> (Login Page)</h1> 

    <div class="div5">
        <div class="div6">
            <div>
                <img src="../image_users/<?php echo $data_user1["Image"] ; ?>"
                    class="div7" alt="profile">
            </div>
            <p class="p1"> your name is : <b class="b1">
                    <?php echo $data_user1["UserName"]; ?> </b> </p>
            <p class="p2"> your Email is : <b class="b2">
                    <?php echo $data_user1["Email"]; ?> </b> </p>
            <p class="p4"> your age is : <b class="b4">
                    <?php echo $data_user1["Age"]; ?> </b> </p>
            <a class="a2" href="../public/edit_profile.php"> edit profile </a>
            <a class="a3" href="../model_crud/delete.php"> delete profile </a>
            <a class="a3" href="../public/login.php">Log Out</a>

        </div>
    </div>

</body>

</html>