<?php 
session_start(); 

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
}

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "System_Users";

try {
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $sql = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password, $option);

    $query = $sql->prepare("SELECT Image FROM users WHERE id = ?");
    $query->execute([$id]);
    $user = $query->fetch();

    $image_name = $user['Image'];  // 

    $query = $sql->prepare("DELETE FROM users WHERE id = ?");
    $query->execute([$id]);

    echo "delete ok";

} catch (PDOException $e) {
    echo $e->getMessage();
}

if (!empty($image_name) && file_exists("../image_users/" . $image_name)) {
    unlink("../image_users/" . $image_name);
}

$_SESSION['delete'] = "Account deleted...";
header("location:../public/login.php");
exit;

