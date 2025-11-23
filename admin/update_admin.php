<?php 
require_once '../model_crud/database.php';
session_start();

if(isset($_SESSION['edit_image'])){
    $nameimage1 = $_SESSION['edit_image'] ;
}
if(isset($_SESSION['edit_id'])){
    $userid = $_SESSION['edit_id'];
}

$UserName = $_POST['UserName_u'];
$Email = $_POST['Email_u'];
$Password = $_POST['Password_u'];
$password_hash = password_hash($password, PASSWORD_BCRYPT);
$age = $_POST['age_u'] ;

$image  = $_FILES['image_u'];
$name_image = $image['name'];
$tmp_image = $image['tmp_name'];
$format = pathinfo($name_image , PATHINFO_EXTENSION );
$name_image2 = md5(time()) . "." . $format;

// var_dump($image);

$query = $sql->prepare(" select count(*) from `users` where `Email` = ? and `Id` != ? ");
$query->execute([$Email, $userid]);
$check_email_2 = $query->fetchColumn();
if ($check_email_2 > 0) {
    $_SESSION['email_error'] = " email new not ok 2 ... Try again please... ";
    
    header("location:../public/see_admin.php") ;
    exit();
}


try {
    
    $sqll = " update `users` set ";
    $fild = [];
    $parametr = [];

    if (!empty($UserName)) {
        $fild[] = " UserName = ? ";
        $parametr[] = $UserName;
    }

    if (!empty($Email)) {
        $fild[] = " Email = ? ";
        $parametr[] = $Email;
    }

    if (!empty($Password)) {
        $fild[] = " Password = ?";

        $_SESSION['password_new'] = $Password; // سشن 

        $parametr[] = $password_hash;
    } else {
        $_SESSION['error password2'] = " please pssword new... "; // سشن 
        header("location:../public/edit_profile.php");
        exit;
    }

    if (!empty($age)) {
        $fild[] = " Age = ? ";
        $parametr[] = $age;
    }

    if (!empty($name_image)) {
        $fild[] = " Image = ? ";
        $parametr[] = $name_image2;

        if ($format === "jpg") {

            if (file_exists("../image_users/" . $nameimage1)) {
                unlink("../image_users/" . $nameimage1);

                $directory = __DIR__ . '/../image_users/' . $name_image2;
                move_uploaded_file($tmp_image, $directory);
                // echo "ok uplod image" ;
            }
        }
    }
    $parametr[] = $userid;

    $sqll .= implode(",", $fild) . " where `Id` = ? ";

    // var_dump($sql)  . "<br>" ;


    $query = $sql->prepare($sqll);
    $query->execute($parametr);
    // echo " ok ";

    $query_2 = $sql->prepare(" select * from `users` where  `id` = ? ");
    $query_2->execute([$userid]);
    $data_user = $query_2->fetch();

    $_SESSION['update'] = " updeta profile edit ok...";  // سشن 
    $_SESSION['update_data'] = $data_user;  // سشن
    // var_dump($sqll);
    header("location:../admin/see_admin.php");
    exit();

} catch (PDOException $e) {
    echo $e->getMessage();
}