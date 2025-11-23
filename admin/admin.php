<?php
session_start();
if(isset($_SESSION['error_serch'])){
    echo $_SESSION['error_serch'] ;
    unset($_SESSION['error_serch']);
}
if(isset($_SESSION['error_e'])){
    echo $_SESSION['error_e'] ;
    unset($_SESSION['error_e']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1 class="h1_admin" > Welcome Admin </h1>
    <div class="div10">
        <div class="div11">
            <form action="/admin/admin_serch.php" method="POST" enctype="multipart/form-data">
                <label class="serch_s" for="serch"> serch users is email </label> <br>
                <input class="serch_a" type="email" name="serch">
                <input class="serch_q" type="submit" name="serch_1" value="Serch" > <br>
                <a  class="show-users" href="../admin/see_admin.php"> Show all users </a>
            </form>
        </div>
    </div>
</body>

</html>