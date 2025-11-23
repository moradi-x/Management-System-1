<?php
session_start();
require_once '../model_crud/database.php';
$userid = $_POST['delete_id'];
$name_image = $_POST['delete_image'];
try {
    $query = $sql->prepare(" delete from `users` where `Id` = ? ");
    $query->execute([$userid]);
    if (file_exists("../image_users/" . $name_image)) {
        unlink("../image_users/" . $name_image);
    }

    $_SESSION['delete'] = " delete ok users ";
    header("location:../admin/see_admin.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}