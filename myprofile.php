<?php 
       include_once 'header.php';
       include_once 'includes/dbh-inc.php';
 ?>


 <div style="height:8px;"></div>
 <div style="width:   800px;background-color: white;border:1px solid black;margin:auto;">
      <div style="padding: 40px">
         <h2  class="cp-clg-h">My Profile</h2><hr>
       <?php  
          $id=$_SESSION['id'];
          $sql="SELECT * FROM users WHERE id='$id';";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
        ?>

         <label>Name : </label><?php echo $row['name'] ?><br>
 		 <label>E-Mail : </label><?php echo $row['email'] ?><br>
 	     <label>gender : </label><?php echo $row['gender'] ?><br>
 	     <?php 
              if(!empty($row['jee_air'])){
              	echo "<label>AIR : </label>".$row['jee_air']."<br>";
              }
              if(!empty($row['category'])){
              	echo "<label>Category : </label>".$row['category']."<br>";
              }
 	      ?>

          <a href="profile-update.php" class="btn btn-outline-success my-2 my-sm-0" role="button">UPDATE</a>


      </div>
</div>       
