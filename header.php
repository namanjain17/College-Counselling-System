<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">  
      
    <title>Home</title>
  </head>
  <body>
   <header>
         <nav>
               <div>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                    </ul>
               </div>
               <div>
                  <?php
                     if(isset($_SESSION['id'])){
                         echo '<form action="includes/logout-inc.php" method="POST">
                                 <button type="submit" name="submit">Logout</button></form>';
                   }
                   else{
                     echo '<form action="includes/login-inc.php" method="POST">
                          <input type="text" name="email" placeholder="Enter E-mail">
                          <input type="password" name="pwd" placeholder="Enter Password">
                          <button type="submit" name="submit">Login</button>
                    </form>
                     <a href="signup.php">Sign up</a>
                    ';
                 }

                  ?>

                   
                    
                    
               </div>

         </nav>
   </header>