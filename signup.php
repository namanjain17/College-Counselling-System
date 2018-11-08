 <?php
 include_once 'header.php';
 ?>

 <div style="height:8px;"></div>
 <div style="width:   800px;background-color: white;border:1px solid black;margin:auto;">
   <div style="padding: 40px">
    <h2  class="cp-clg-h">Sign Up</h2><hr>
    <form action="includes/signup-inc.php" method="POST" style="width: 500px;margin:auto">  
      <label>Name : </label>  
      <input type="text" name="name" class="form-control" placeholder="Enter Name" > <br> 
      <label>E-Mail : </label>  
      <input type="text" name="email" class="form-control" placeholder="Enter E-Mail" > <br>
      <label>Password  : </label><input type="password" name="pwd" class="form-control" placeholder="Password"><br>
      <label>Gender : </label>
         <select name="gender"  class="form-control">
         <option value="male">Male</option>
         <option value="female">Female</option>
      </select><br>
      <button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">Sign Up</button>
    </form>
  </div>
</div>














    

<?php
include_once 'footer.php';
?>      


