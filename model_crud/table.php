<?php
// قبل از ایجاد جدول این صفحه برو به صفحه دیتابیس و دیتابیس درست کن
require_once './database.php';

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "System_Users"; 
try {
    $option = [pdo::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION,pdo::ATTR_DEFAULT_FETCH_MODE=>pdo::FETCH_ASSOC];
    $sql = new PDO ("mysql:host=$localhost;dbname=$dbname",$username,$password,$option);
    $query = $sql->prepare(" create table if not exists `users` (
        Id int(3) not null primary key auto_increment ,
        UserName varchar(100) not null ,
        Email varchar(100) not null unique ,
        Password varchar(100) not null ,
        Age int(3) not null ,
        Image varchar(100) not null
    ) ") ;
    $query->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}