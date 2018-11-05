<?php 

session_start();

if(isset($_POST['submit'])){
	include_once "dbh-inc.php";
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    //Error Handlers
    //Check if inputs are empty
    if(empty($email)||empty($pwd)){
    	header("Location: ../index.php?login=empty");
        exit();
    }
    else{
    	  $sql="SELECT * FROM users WHERE email='$email';";
    	  $result=mysqli_query($conn,$sql);
    	  $resultCheck=mysqli_num_rows($result);
    	  if($resultCheck<1){
    	  	  header("Location: ../index.php?login=noemail");
    	  	  exit();
    	  }
    	  else{
    	  	  if($row=mysqli_fetch_assoc($result)){
                  //Dehashing the password
    	  	  	  $hashedPwdCheck=password_verify($pwd,$row['pwd']);
    	  	  	  $id=$row['id'];
    	  	  	  if($hashedPwdCheck==false){
                        header("Location: ../index.php?login=password");
    	  	            exit();
    	  	  	  }
    	  	  	  elseif($hashedPwdCheck==true){
                        
                        //log int the user here
    	  	  	  	    $_SESSION['id']=$row['id'];
    	  	  	  	    $_SESSION['name']=$row['name'];
    	  	  	  	    $_SESSION['email']=$row['email'];
    	  	  	  	    $_SESSION['gender']=$row['gender'];
    	  	  	  	    $_SESSION['board_marks']=$row['board_marks'];
    	  	  	  	    $_SESSION['jee_air']=$row['jee_air'];
    	  	  	  	    $_SESSION['category']=$row['category'];
    	  	  	  	   
                        header("Location: ../index.php?login=success");
                        exit();


    	  	  	  }
    	  	  }
    	  }
    }

}
else{
    header("Location: ../index.php?login=error");
    exit();
}