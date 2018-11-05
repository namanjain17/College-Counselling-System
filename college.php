 <?php
     include_once 'header.php';
     include_once 'includes/dbh-inc.php';
     if(isset($_GET["submit"])){
     	  $collegename=mysqli_real_escape_string($conn,$_GET["college"]);
     	  $sql="SELECT * from college where name = '$collegename';";
     	  $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $collegeid=$row['collegeid'];
          $sql1="SELECT * FROM (SELECT courseid FROM college INNER JOIN coursesoffered ON college.collegeid = coursesoffered.collegeid where college.collegeid='$collegeid')as t INNER JOIN course ON t.courseid=course.courseid order by course.duration ASC;";
          $result1=mysqli_query($conn,$sql1);
          $sql2="SELECT * FROM (SELECT * FROM cutoff WHERE collegeid='$collegeid') as t INNER JOIN course on t.courseid=course.courseid ORDER BY t.category ASC;";
          $result2=mysqli_query($conn,$sql2);
          
   ?>
      <div> 
      	    <h1>ABOUT</h1>
      	    <label>Name : </label><?php echo $row['name'] ?><br>
      	    <label>Location : </label><?php echo $row['location'] ?><br>
      </div>
      <div>
      	     <h1>Courses offered</h1>
      	        <table>
      	        	<tr>
      	        		<td>Course Name</td>
      	        		<td>Duration</td>
      	        		<td>Degree</td>
      	        	</tr>
      	           <?php 
                     while($row1=mysqli_fetch_assoc($result1)){
                     	$name=$row1['name'];$duration=$row1['duration'];$degree=$row1['degree'];
      	                echo "<tr>
                               <td>$name</td>
                               <td>$duration</td>
                               <td>$degree</td>
      	                </tr>";

      	         	 }

      	        	  ?>
      	        </table>

      </div>
      <div>
      	     <h1>Cutoffs</h1>
      	        <table>
      	        	<tr>
      	        		<td>Course Name</td>
      	        		<td>Degree</td>
      	        		<td>Year</td>
      	        		<td>Category</td>
      	        	    <td>Open</td>
      	        		<td>Close</td>
      	        	</tr>
      	           <?php 
                     while($row2=mysqli_fetch_assoc($result2)){
                     	$name=$row2['name'];$year=$row2['year'];$degree=$row2['degree'];
                     	$open=$row2['open'];$close=$row2['close'];$cat=$row2['category'];
      	                echo "<tr>
                               <td>$name</td>
                               <td>$degree</td>
                               <td>$year</td>
                               <td>$cat</td>
                               <td>$open</td>
                               <td>$close</td>
      	                </tr>";

      	         	 }

      	        	  ?>
      	        </table>

      </div>
    <?php
     	  exit();
     }
 ?>
 
 <section>
     <div>
          <h2>Colleges</h2>
               
               <form action="college.php",method="GET">
               <label>Select College : </label>	<select name="college">
              	   <?php 
                        $sql="SELECT * from college;";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                        	$name=$row['name'];
                        	echo "<option value='$name'>$name</option>";
                        }
              	    ?>    
               </select><br>
               <button type="submit" name="submit">SUBMIT</button><br>
               </form>
         
     </div>
 </section>     

<?php
      include_once 'footer.php';
?>      
      
      