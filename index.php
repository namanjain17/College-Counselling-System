<?php
include_once 'header.php';
include_once 'includes/dbh-inc.php';
?>

<div style="height:8px;"></div>
<div style="width:800px;background-color: white;border:1px solid black;margin:auto;">
	<div style="padding: 40px">
          <h2  class="cp-clg-h">Home</h2><hr>
          Welcome to our site!
          <div style="height:26px;"></div>
          <h2  class="cp-clg-h">Recent Blogs</h2><hr>
          <div style="height:17px;"></div>
          <?php
                $sql="SELECT * FROM blogs INNER JOIN users ON blogs.userid=users.id ORDER BY blogs.datetime DESC;";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                	$subject=$row['subject'];
                	$datetime=$row['datetime'];
                	$content= $row['content'];
                	$username=$row['name'];
                	  echo " 
                           <div class=\"card\">
                                <h4 >$subject</h2>
                                <h6 >$datetime</h6><h6 align=\" right \">-By $username</h6>
                               <font size=\"4\">$content</font>
                           </div> 
                           <div style=\"height:26px;\"></div>
                	  ";
                }
                
           ?>

	</div>
</div>
<        	



<?php
include_once 'footer.php';
?>      












