<?php
require_once '../model_crud/database.php';
session_start();


if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
if (isset($_SESSION['email_error'])) {
    echo  $_SESSION['email_error'];
    unset($_SESSION['email_error']);
}
if (isset($_SESSION['error password2'])) {
    echo $_SESSION['error password2'];
    unset($_SESSION['error password2']);
}
if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

$query5 = $sql->prepare(" select * from `users`  ");
$query5->execute();
$data =  $query5->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دیدن همه کاربران</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="fff">
        <table class="tablee">
            <tr>
                <th>Id</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Age</th>
                <th>Image</th>
                <th>Delete</th>
                <th>adit</th>

            </tr>
            <?php foreach ($data as $item): ?>
                <tr>
                    <th><?php echo $item["Id"]; ?></th>
                    <th><?php echo $item["UserName"]; ?></th>
                    <th><?php echo $item["Email"]; ?></th>
                    <th><?php echo $item["Age"]; ?></th>
                    <th> <img src="../image_users/<?php echo $item["Image"]; ?>" alt="profile" class="image_5"></th>

                    <th>
                        <form action="../admin/delete_admin.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $item["Id"]; ?>">
                            <input type="hidden" name="delete_image" value="<?php echo $item["Image"]; ?>">
                            <input type="submit" value="Delete" class="a10">
                        </form>
                    </th>
                    <th>
                        <form action="../admin/edit_admin.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $item["Id"]; ?>">
                            <input type="hidden" name="edit_image" value="<?php echo $item["Image"]; ?>">
                            <input type="submit" value="edit" class="a11">
                        </form>
                    </th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a class="a4" href="../admin/admin.php">back</a>

</body>

</html>