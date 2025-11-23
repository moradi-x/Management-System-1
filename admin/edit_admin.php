<?php
session_start();
require_once '../model_crud/database.php';
$userid = $_POST['edit_id']; 
$_SESSION['edit_id'] = $userid ;
$_SESSION['edit_image'] = $_POST['edit_image'] ;
$nameimage = $_POST['edit_image'] ;

// var_dump($userid);
// var_dump($nameimage);
try {
    $query = $sql->prepare(" select * from `users` where `Id` = ? ");
    $query->execute([$userid]);
    $data = $query->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> ادیت پروفایل </title>
     <link rel="stylesheet" href="../style/style.css">
 </head>

 <body>
     <h1 class="h4"> edit profile is admin</h1>

     <div class="div3">
         <div class="div4">
             <form action="../admin/update_admin.php" enctype="multipart/form-data" method="post" >
                 <label for="UserName_r">UserName:</label> <br>
                 <input type="text" name="UserName_u" value="<?php echo $data["UserName"] ?>" > <br>

                 <label for="Email_u">Email:</label> <br>
                 <input type="email" name="Email_u" value="<?php echo $data["Email"] ?>" > <br>

                 <label for="Password_u">Password</label> <br>
                 <input type="password" name="Password_u" placeholder="please password new..." > <br>
                 <p class="p6" > Must be filled out  </p>

                 <label for="age_u">age:</label> <br>
                 <input type="number" name="age_u" > <br>

                 <label for="image_u">image:</label> <br>
                 <input type="file" name="image_u" class="image" > <br>
                <div > <img class="div7" src="../image_users/<?php echo $data["Image"]; ?> " alt="photo"> </div> 
                 <b class="b0"> Only "jpg" format </b>

                 <input type="submit" name="submit_u" value="edit ok ">
             </form>
         </div>
     </div>
 </body>
 </html>