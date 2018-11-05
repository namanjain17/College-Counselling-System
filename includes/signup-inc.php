<?php 

   if(isset($_POST['submit'])){
          include_once "dbh-inc.php";
          $name=mysqli_real_escape_string($conn,$_POST['name']);
          $email=mysqli_real_escape_string($conn,$_POST['email']);
          $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
          $gender=mysqli_real_escape_string($conn,$_POST['gender']);
          //Error handlers
          //Check for empty fields
          if(empty($name)||empty($email)||empty($pwd)||empty($gender)){
                header("Location: ../signup.php?signup=empty");
   	            exit();
          }
          else{
               //Check if input characters are valid
          	    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                    header("Location: ../signup.php?signup=invalid");
   	                exit(); 
          	    }
          	    else{
                    //check if email is invalid
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        header("Location: ../signup.php?signup=email");
   	                    exit(); 
                    }
                    else{
                         $sql = "SELECT * FROM users WHERE email='$email';";
                         $result = mysqli_query($conn,$sql);
                         $resultCheck=mysqli_num_rows($result);
                         if($resultCheck>0){
                         	   header("Location: ../signup.php?signup=usertaken");
   	                           exit(); 
                         }
                         else{
                         	//Hashing the Password
                         	$hashPwd=password_hash($pwd,PASSWORD_DEFAULT);
                         	//Insert the user into the database
                          $sql="INSERT INTO users(name,email,gender,pwd) VALUES ('$name','$email','$gender','$hashPwd');";
                          $result=mysqli_query($conn,$sql);
                          header("Location: ../signup.php?signup=success");
   	                      exit(); 

                         }
                    }
          	    }
          }

   }
   else{
   	     header("Location: ../signup.php");
   	     exit();
   }
