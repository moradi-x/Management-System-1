<?php
session_start();
// قبل از اجرای این صفحه  برو جدول و دیتابیس درست کن اگر نیست
require_once '../model_crud/table.php';

$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

if (empty($UserName) || empty($Password)) {
    $_SESSION['error_login'] = " please UserName and Password... ";
    header("location:../public/LogIn.php");
    exit();
}


try {
    $query = $sql->prepare(" select * from `users` where `UserName` = ? ");
    $query->execute([$UserName]);
    $name_fetch = $query->fetch();

    if(!$name_fetch){
        $_SESSION['error_login2'] = " error login dont ok user name new...  " ;
        header("location:../public/LogIn.php");
        exit();
    }

    $Password_hash = $name_fetch["Password"];
    if(!password_verify($Password , $Password_hash)){
        $_SESSION['error_login3'] = " error password dont ok... " ;
        header("location:../public/LogIn.php");
        exit();  
    }
    $admin = ["mmdmoradi" , "saramoradi"];
    if( in_array($UserName , $admin )){
        header("location:../admin/admin.php");
        exit();
    }
    $_SESSION['user_id'] = $name_fetch["Id"] ; 
    header("location:../public/profile_login.php");
    echo "ok" ;

} catch (PDOException $e) {
    echo $e->getMessage();
}