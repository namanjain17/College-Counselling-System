 <?php
     include_once 'header.php';
 ?>
 
 <section>
     <div>
          <h2>HOME</h2>
          <?php
              if(isset($_SESSION['id'])){
                echo "Welcome " . $_SESSION['name']. ". You are logged in.";
               

            }

          ?>
   

<?php
      include_once 'footer.php';
?>      
      
      
      
      
      
      
      
      
      
      
      
      
