<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">  
<style type="text/css">
body { background: #e6e6e6 !important;
} 

.container {
    width: 90%;
    height: 1600;
    margin: auto;
    padding: 10px;
}
.one {
    width: 25%;
    height: 1600px;
    background: white;
    float: left;
    border:1px solid black;
    border-right: 0px;
    
}
.two {
    margin-left: 25%;
    height: 1600px;
    background: white;
    border:1px solid black;

}

.cp-clg-h {
    font-family: Georgia, serif;
    font-size: 26px;
}

.cp-clg-s {
    font-family: Georgia, serif;
    font-size: 20px;
}




</style>
    <title>Home</title>
  </head>
  <body>
      

 <?php $admins=array("admin@dbms.com");?>
<nav class="navbar navbar-dark bg-dark">
 <a class="navbar-brand" href="index.php">HOME</a>
   <!-- <input class="form-control mr-sm-2" placeholder="Enter E-mail">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->

 <?php
                     if(isset($_SESSION['id'])){
                         echo '<form class="form-inline" action="includes/logout-inc.php" method="POST">
                                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Logout</button></form>
                                 ';
                            

                   }
                   else{
                     echo '<form class="form-inline" action="includes/login-inc.php" method="POST">
                          <input class="form-control mr-sm-2" type="text" name="email" placeholder="Enter E-mail">
                          <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Enter Password">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Login</button>

                    </form>
                    <a href="signup.php" class="btn btn-outline-success my-2 my-sm-0" role="button">Sign up</a>
                    ';
                 }

            ?>


</nav>



   <header>
         <nav>
            
                  <?php
                     if(isset($_SESSION['id'])){
                         echo '
                                
                                
                  <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <div class="navbar-nav">
                      <a class="nav-item nav-link" href="myprofile.php">My Profile</a>
                      <a class="nav-item nav-link" href="college.php">Colleges</a>
                      <a class="nav-item nav-link" href="cutoff.php">Cutoff</a>
                      
                    </div>
                </nav>
                  ';
                           }
                  ?>

                   
                    
                    
               </div>

         </nav>
   </header>