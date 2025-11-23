<?php 
// یک دیتابیس بساز برام 
$localhost = "localhost" ;
$username = "root";
$password = "";
$dbname = "System_Users";
try {
    $option = [pdo::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION,pdo::ATTR_DEFAULT_FETCH_MODE=>pdo::FETCH_ASSOC];
    $sql= new PDO("mysql:host=$localhost",$username,$password,$option);
    $query = $sql->prepare(" create database if not exists `System_Users` collate utf8_general_ci ");
    $query->execute();
    $sql = new PDO("mysql:localhost=$localhost;dbname=$dbname",$username,$password,$option);
} catch (PDOException $e) {
    echo $e->getMessage();
}

