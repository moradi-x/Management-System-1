<?php
session_start();
if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
}
if (isset($_SESSION['error_login'])) {
    echo $_SESSION['error_login'];
    unset($_SESSION['error_login']);
}
if(isset($_SESSION['error_login2'])){
    echo $_SESSION['error_login2'];
    unset($_SESSION['error_login2']);
}
if(isset($_SESSION['error_login3'])){
    echo $_SESSION['error_login3'];
    unset($_SESSION['error_login3']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> لاگین</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <h1 class="h1"> LogIn please </h1>
    <div class="div1">
        <div class="div2">
            <form action="../model_crud/check.php" method="POST">
                <label for="UserName">UserName:</label> <br>
                <input type="text" name="UserName"> <br>

                <label for="Password">Password:</label> <br>
                <input type="password" name="Password"> <br>

                <input class="submit" type="submit" name="submit" value="LogIn"> <br>
                <a href="./Register.php" class="ahref">register</a>
            </form>
        </div>
    </div>
</body>
<?php session_unset(); ?>

</html>