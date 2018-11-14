<?php 
       include_once 'header.php';
       include_once 'includes/dbh-inc.php';
 ?>

 <div style="height:8px;"></div>
 <div style="width:   800px;background-color: white;border:1px solid black;margin:auto;">
    <div style="padding: 40px">
         <h2  class="cp-clg-h">My Blogs </h2><hr>
         <a href="blog-create.php" class="btn btn-outline-success my-2 my-sm-0" role="button">Create</a>
          <div style="height:17px;"></div>
          
          <?php 
                $userid=$_SESSION['id'];
                $sql="SELECT * FROM blogs where userid=\"$userid\";";
                $result=mysqli_query($conn,$sql);

                while($row=mysqli_fetch_assoc($result)){
                	$subject=$row['subject'];
                	$datetime=$row['datetime'];
                	$content= $row['content'];
                	  echo " 
                           <div class=\"card\">
                                <h4 >$subject</h2>
                                <h6 >$datetime</h5><hr>
                                <font size=\"4\">$content</font>
                           </div> 
                           <div style=\"height:26px;      \"></div>
                	  ";
                }
           ?>

         
    </div> 	
 </div>
	
 
 