<?php 
//connection File 
require_once('../include/confg.php'); ?>

<?php 
//include head file for language preference 
include("head.php");  ?>
    <title>Hamro News</title>

    <?php 
//header content //navbar 
    include("header.php");  ?>
 <br>
    <form action=""method="GET">
 <div class="sr">
    <center>
<input type="search" placeholder="Search here" name="search" value=""></center>

</div></form>
<div class="container">
<div class="content">
    
 
        <?php
            try {   
                    //selecting data by id 
               $stmt = $db->query('SELECT articleId, articleTitle,articleDescript, articleDate FROM tecnoblog ORDER BY articleId DESC');

                while($row = $stmt->fetch()){
                    
                    echo '<div>';
                        echo '<h1><a href="show.php?id='.$row['articleId'].'">'.$row['articleTitle'].'</a></h1>';
                             
                      //Display the date 
                     echo '<p style="color:red;font-size:13px;">Posted on '.date(' jS M Y', strtotime($row['articleDate'])).'</p>';
                 



                        echo '<p>'.$row['articleDescript'].'</p>';                
                        echo '<p><button class="readbtn"><a href="show.php?id='.$row['articleId'].'">Read More</a></button></p>';  
                        echo '<hr>';             
                    echo '</div>';

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>  
</div>
<?php
include("sidebar.php");?>
</div>

</div>

<?php 
include("footer.php"); ?>