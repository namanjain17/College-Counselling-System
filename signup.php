 <?php
     include_once 'header.php';
 ?>
  <section>
     <div>
          <h2>Signup</h2>
          <form action="includes/signup-inc.php" method="POST">
          	  <label>Name :</label><input type="text" name="name" placeholder="Full Name"><br>
          	  <label>E-Mail : </label><input type="text" name="email" placeholder="E-mail"><br>
          	  <label>Password  : </label><input type="password" name="pwd" placeholder="Password"><br>
              <label>Gender : </label>
              <select name="gender">
              	 <option value="male">Male</option>
              	 <option value="female">Female</option>
              </select><br>
               <button type="submit" name="submit">Sign Up</button>
          </form>
     </div>
 </section>      

<?php
      include_once 'footer.php';
?>      
      
      
      