 
<?php
//include connection file 
require_once('../include/confg.php');

//check logged in or not 
if(!$user->is_logged_in()){ header('Location: login.php'); }

?>

<?php include("head.php");  ?>
  <title>Users- Techno Smarter Blog</title>
  <?php include("header.php");  ?>

<div class="content">
    <h2>Add Users</h2>
 <?php 
  //show message from add / edit page
  if(isset($_POST['submit'])){

    //collect form data
    extract($_POST);

    //very basic validation
    if($username ==''){
        $error[] = 'Please enter the username.';
    }

    if($password ==''){
        $error[] = 'Please enter the password.';
    }

    if($confirmpassword ==''){
        $error[] = 'Please confirm the password.';
    }

    if($password != $confirmpassword){
        $error[] = 'Passwords do not match';
    }

    if($email ==''){
        $error[] = 'Please enter the email address.';
    }

    if(!isset($error)){

        $hashedpassword = $user->create_hash($password);

        try {

            //insert into database
            $stmt = $db->prepare('INSERT INTO tecnobloguser (username,password,email) VALUES (:username, :password, :email)') ;
            $stmt->execute(array(
                ':username' => $username,
                ':password' => $hashedpassword,
                ':email' => $email
            ));

            //redirect to Blog user page 
            header('Location: blog-user.php?action=added');
            exit;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

}

if(isset($error)){
    foreach($error as $error){
        echo'<p class="message">'.$error.'</p>';
    }

}
?>

<form action="" method="post">

<p><label>Username</label><br>
<input type="text" name="username" value="<?php if(isset($error)){
    echo $_POST['username'];
}?>"></p>

<p><label>Password</label><br>
<input type="password" name="password" value="<?php if(isset($error)){
    echo $_POST['password'];
}?>"></p>

<p><label>Confirm Password</label><br>
<input type="password" name="confirmpassword" value="<?php if(isset($error)){
    echo $_POST['confirmpassword'];
}?>"></p>

<p><label>Email</label><br>
<input type="email" name="email" value="<?php if(isset($error)){
    echo $_POST['email'];
}?>"></p>


<button name="submit" class="subbtn">Add User</button>

</form>
</div>
<?php include("footer.php");