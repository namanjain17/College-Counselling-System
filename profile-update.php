<?php 
       include_once 'header.php';
       include_once 'includes/dbh-inc.php';
       if(isset($_POST['submit'])){
       	    $id=$_SESSION['id'];
            $name=mysqli_real_escape_string($conn,$_POST['name']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $category=mysqli_real_escape_string($conn,$_POST['category']);
            $gender=mysqli_real_escape_string($conn,$_POST['gender']);
            $air=mysqli_real_escape_string($conn,$_POST['jee_air']);
           
            if(empty($name)||empty($email)){
                header("Location: profile-update.php?update=empty");
   	            exit();
            }
          else{
               //Check if input characters are valid
          	    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                    header("Location: profile-update.php?update=invalid");
   	                exit(); 
          	    }
          	    else{
                    //check if email is invalid
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        header("Location: profile-update.php?update=email");
   	                    exit(); 
                    }
                    else{	
                          $sql="UPDATE users SET name='$name',email='$email',gender='$gender',jee_air=$air,category='$category' where id=$id;";
                          $result=mysqli_query($conn,$sql);
                          if (!mysqli_query($conn,$sql)){
                                 header("Location: profile-update.php?update=email");
                                exit();
                          } 
                          header("Location: myprofile.php?update=success");
    	  	  	  	       $_SESSION['name']=$name;
    	  	  	  	       $_SESSION['email']=$email;
    	  	  	  	       $_SESSION['gender']=$gender;
    	  	  	  	       $_SESSION['jee_air']=$air;
    	  	  	  	       $_SESSION['category']= $category;
   	                      exit(); 

                         
                    }
          	    }
          }

             exit();
       }
        
 ?>









 <div style="height:8px;"></div>
 <div style="width:   800px;background-color: white;border:1px solid black;
        margin:auto;">
      <div style="padding: 40px">
        <h2  class="cp-clg-h">Update Profile</h2><hr>
     </div>

     <form action="profile-update.php" method="POST" style="width: 500px;margin:auto"> 			
 		<div class="form-group">
 			 <label>Name : </label>	
 			 <input type="text" name="name" class="form-control" value="<?php $t=$_SESSION['name'];echo "$t";?>" > <br> 
 			  <label>E-mail : </label>	
 			 <input type="text" name="email" class="form-control" value="<?php $t=$_SESSION['email'];echo "$t";?>" > <br> 
             <?php 
              if(isset($_GET['update'])&&$_GET['update']=='email'){
              	     echo "<font style=\"color:red;\">* E-Mail already taken!</font><br>";
              }
 		 ?>



 			 <label>JEE-AIR : </label>	
 			 <input type="text" name="jee_air" class="form-control" value="<?php $t=$_SESSION['jee_air'];echo "$t";?>" > <br> 
 			 <?php  ?>
 			 <label>Gender : </label>	
 			 <select name="gender" class="form-control">
 			 	 <option value="female" <?php if($_SESSION['gender']=="female") echo"selected=\"selected\""; ?>>Female</option>
              	 <option value="male" <?php if($_SESSION['gender']=="male") echo"selected=\"selected\""; ?> >Male</option>
              	 
              </select><br>
              <label>Category : </label>	
              <select name="category" class="form-control">
 			 	 <option value="general" <?php if($_SESSION['gender']=="general") echo"selected=\"selected\""; ?>>General</option>
              	 <option value="obc" <?php if($_SESSION['category']=="obc") echo"selected=\"selected\""; ?> >OBC</option>
              	 
              </select><br>
             


 		</div> 
 		<button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" >SUBMIT</button>
 		</form>
 		
 </div>


 <?php
      include_once 'footer.php';
?>    