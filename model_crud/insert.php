<?php
session_start();
require_once './database.php';
require_once './table.php';

$UserName = $_POST['UserName_r'];
$Email = $_POST['Email_r'];
$password = $_POST['Password_r'];
$hash_password = password_hash($password, PASSWORD_BCRYPT);
$age = $_POST['age_r'];
$image = $_FILES['image_r'];
$name_image = $image['name'];
$tmp_name_image = $image['tmp_name'];
$format = pathinfo($name_image, PATHINFO_EXTENSION);
$name_image2 = md5(time()) . "." . $format;

$_SESSION['name'] =  $UserName; // سشن
$_SESSION['password'] = $password; // سشن
// var_dump($_SESSION['name']);

if (empty($UserName) || empty($Email) || empty($password) || empty($age) || empty($image)) {
    $_SESSION['full'] = "create full aption please... "; // سشن
    header("location:../public/Register.php");
    exit;
}

$query_3 = $sql->prepare(" select count(*) from `users` where `Email` = ? ");
$query_3->execute([$Email]);
$check_email = $query_3->fetchColumn();
if ($check_email > 0 ) {
    $_SESSION['erro_email'] = "Email already exists..." ;
    header("location:../public/Register.php");
    exit() ;
}

if ($format === "jpg") {
    $dirctory = __DIR__ . '/../image_users/' . $name_image2;
    move_uploaded_file($tmp_name_image, $dirctory);
} else {
    echo " format image not ok " .  "<br>" . "Try again please...";
    $_SESSION['error format'] = " format image not ok... Try again please...";
    header("location:../public/Register.php");
    exit();
}

try {
    $query = $sql->prepare(" insert into `users` (`UserName`,`Email` ,`Password`,`Age`,`Image`) 
    values (?,?,?,?,?) ");
    $query->execute([$UserName, $Email, $hash_password, $age, $name_image2]);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$_SESSION['user_id'] =  $sql->lastInsertId();  // سشن
$user_id = $_SESSION['user_id'];
$_SESSION['name_image2'] = $name_image2;  // سشن

// var_dump($_SESSION['user_id']);
// echo "gggg";
header("location:../model_crud/select.php");