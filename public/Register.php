<?php
    session_start();
    if (isset($_SESSION['full'])) {
        echo $_SESSION['full'];
        unset($_SESSION['full']);
    }
    if (isset($_SESSION['error format'])) {
        echo $_SESSION['error format'];
        unset($_SESSION['error format']);
    }
    if(isset($_SESSION['erro_email'])){
        echo $_SESSION['erro_email'];
        unset($_SESSION['erro_email']);
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ثبت نام </title>
</head>
<link rel="stylesheet" href="../style/style.css">

<body>
    <h1 class="h2"> register please </h1>
    <form action="../model_crud/insert.php" method="post" enctype="multipart/form-data">
        <div class="div3">
            <div class="div4">
                <label for="UserName_r">UserName:</label> <br>
                <input type="text" name="UserName_r" id=""> <br>

                <label for="Email_r">Email:</label> <br>
                <input type="email" name="Email_r" id=""> <br>

                <label for="Password_r">Password</label> <br>
                <input type="password" name="Password_r" id=""> <br>

                <label for="age_r">age:</label> <br>
                <input type="number" name="age_r" id=""> <br>

                <label for="image">image:</label> <br>
                <input type="file" name="image_r" class="image"> <br>
                <b class="b0"> Only "jpg" format </b>

                <input type="submit" name="submit_r" value="register ok ">
            </div>
        </div>
    </form>
</body>

</html>

