
<?php 
include("head.php");
?>
<?php 
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact-hamronews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <form action="" method="post">
       <center>     
<div class="forms">
    <ul>
    <center>
       <u><h3>Contact Form</h3></center>
       <hr>
          <li><label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="Enter your first name" required><br></li>  
<hr>
          <li>  <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Enter your last name" required><br>
            </li><hr>
         <li>  <label for="password">New Password</label>
            <input type="passwordt" name="password" placeholder="create new password" required><br>
            </li><hr>
           <li><label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            </li> <hr>
            </ul>
            <div class="submit">
            <input type="submit" name="submit">
            <br></div>
        </form>
     
        </div>
    </center>
    <?php
    $con = mysqli_connect("localhost","root","","technosmartcms");
?>
</body>
</html>

<?php 
include("footer.php");
?>
