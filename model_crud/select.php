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
echo "<pre>" ;
// var_dump($_SESSION['data']);
// print_r($_SESSION['data']);

header("location:../public/profile.php");