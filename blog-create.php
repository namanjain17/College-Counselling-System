<?php 
       include_once 'header.php';
       include_once 'includes/dbh-inc.php';
       if(!isset($_SESSION['id'])){
             header("Location: index.php?error=NotLoggedIn");
             exit();
       }
       if(isset($_POST['submit'])){
       	     $content=$_POST['content'];
       	     if($content==""){
       	     }
       	     $subject=$_POST['subject'];
       	     $userid=$_SESSION['id'];
       	     if(empty($subject)||empty($content)){
       	     	header("Location: myblogs.php?error=empty");
                exit();
       	     }
       	     $sql="INSERT INTO blogs(userid,datetime,subject,content) VALUES ($userid,NOW(),\"$subject\",\"$content\");";
       	     $result=mysqli_query($conn,$sql);
       	     header("Location: myblogs.php?create=success");
             exit();
       }

 
 ?>

 <div style="height:8px;"></div>
 <div style="width:   800px;background-color: white;border:1px solid black;margin:auto;">
    <div style="padding: 40px">
         <h2  class="cp-clg-h">Create Blog </h2><hr>
         <form action="blog-create.php" method="POST" style="width: 500px;margin:auto"> 			
 		<div class="form-group">
 			 <label>Subject : </label><br>	
 			 <input type="text" name="subject" class="form-control" placeholder="Enter Subject" > <br>
 			 <label>Content : </label><br>
             <textarea name="content" rows="10" cols="66" placeholder="Enter Your Blog"></textarea>
 		</div> 
 		<button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">CREATE</button>
 		</form> 

         
    </div> 	
 </div>



