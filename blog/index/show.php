<?php require('../include/confg.php'); 

$stmt = $db->prepare('SELECT articleId,articleDescript,articleTitle, articleContent, articleDate FROM tecnoblog WHERE articleId = :articleId');
$stmt->execute(array(':articleId' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['articleId'] == ''){
    header('Location: ./');
    exit;
}
?>

<?php include("head.php");  ?>

    <title><?php echo $row['articleTitle'];?>Hamro News</title>
  <meta name="description" content="<?php echo $row['articleDescript'];?>">    
<meta name="keywords" content="Article Keywords">

<?php include("header.php");  ?>
<div class="container">
<div class="content">


<?php
            echo '<div>';
                echo '<h1>'.$row['articleTitle'].'</h1>';

                echo '<p style="color:red; font-size:13px;"> '.date('jS M Y', strtotime($row['articleDate'])).'</p>';
                
                echo '<p>'.$row['articleContent'].'</p>';    

            echo '</div>';
        ?>
       
   </div>
   <?php
   include("sidebar.php");
   ?>
     </div>

     <?php 
$baseUrl="http://localhost/blog/"; 
  $articleIdc=$row['articleId']; 


?> 
<center>Share Post</center>
<center>       
<div  class="shareicon">
          
                  
            <a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $baseUrl.$articleId; ?>"> <i class="fa-brands fa-square-facebook"></i>
                
                <a target="_blank" href="http://twitter.com/share?text=Visit the link &url=<?php echo $baseUrl.$articleIdc; ?>&hashtags=blog,technosmarter,programming,tutorials,codes,examples,language,development">
                <i class="fa-brands fa-square-twitter"></i>

                
                 <a target="_blank" href="http://instagram.com/pin/create/button/?url=<?php echo $baseUrl.$articleIdc; ?>">
                 <i class="fa-brands fa-instagram"></i>
           

              </div></center>     
<?php include("footer.php");  ?> 