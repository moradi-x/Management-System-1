<?php
require_once './table.php';
session_start();


if (isset($_SESSION['user_id'])) {
    $id_2 = $_SESSION['user_id'];
}
if (isset($_SESSION['data'])) {
    $data3 = $_SESSION['data'];
    $name_image1 = $data3["Image"];
}

$UserName_2 = $_POST['UserName_u'];
$Email_2 = $_POST['Email_u'];
$Password_2 = $_POST['Password_u'];
$Age_2 = $_POST['age_u'];

$Image_2 = $_FILES['image_u'];
$name_Image_2 = $Image_2['name'];
$hassh_name_image_2 = md5(time()) . $name_Image_2;
$tmp_image2 = $Image_2['tmp_name'];
$format2 = pathinfo($name_Image_2, PATHINFO_EXTENSION);
$_SESSION['name_image_new'] = $hassh_name_image_2;  // سشن 

$query_4 = $sql->prepare(" select count(*) from `users` where `Email` = ? and `Id` != ? ");
$query_4->execute([$Email_2, $id_2]);
$check_email_2 = $query_4->fetchColumn();

if ($check_email_2 > 0) {
    $_SESSION['email_error'] = " Email already exists...";

    header("location:../public/edit_profile.php");
    exit();
}

try {

    $sqll = " update `users` set ";
    $fild = [];
    $parametr = [];

    if (!empty($UserName_2)) {
        $fild[] = " UserName = ? ";
        $parametr[] = $UserName_2;
    }

    if (!empty($Email_2)) {
        $fild[] = " Email = ? ";
        $parametr[] = $Email_2;
    }

    if (!empty($Password_2)) {
        $fild[] = " Password = ?";
        $Password_hash_2 = password_hash($Password_2, PASSWORD_DEFAULT);
        $_SESSION['password_new'] = $Password_2; // سشن 

        $parametr[] = $Password_hash_2;
    } else {
        $_SESSION['error password2'] = " please pssword new... "; // سشن 
        header("location:../public/edit_profile.php");
        exit;
    }

    if (!empty($Age_2)) {
        $fild[] = " Age = ? ";
        $parametr[] = $Age_2;
    }

    if (!empty($name_Image_2)) {
        $fild[] = " Image = ? ";
        $parametr[] = $hassh_name_image_2;

        if ($format2 === "jpg") {

            if (file_exists("../image_users/" . $name_image1)) {
                unlink("../image_users/" . $name_image1);

                $directory = __DIR__ . '/../image_users/' . $hassh_name_image_2;
                move_uploaded_file($tmp_image2, $directory);
                // echo "ok uplod image" ;
            }
        }
    }else {
        $_SESSION['error_img'] = " please image new... "; // سشن 
        header("location:../public/edit_profile.php");
        exit;
    }


    $parametr[] = $id_2;

    $sqll .= implode(",", $fild) . " where `Id` = ? ";

    $query = $sql->prepare($sqll);
    $query->execute($parametr);

    $query_2 = $sql->prepare(" select * from `users` where  `id` = ? ");
    $query_2->execute([$id_2]);
    $data_user = $query_2->fetch();

    $_SESSION['update'] = " updeta profile edit ok...";  // سشن 
    $_SESSION['update_data'] = $data_user;  // سشن
    // "<pre> ";
    // var_dump($_SESSION['update_data']);
    // "</pre>";

    var_dump($_SESSION['update_data']);
} catch (PDOException $e) {
    echo $e->getMessage();
}
header("location:../public/profile_update.php");
