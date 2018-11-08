 <?php
 include_once 'header.php';
 include_once 'includes/dbh-inc.php';
 if(isset($_GET["submit"])){
 	$collegename=mysqli_real_escape_string($conn,$_GET["college"]);
 	$sql="SELECT * from college where name = '$collegename';";
 	$result=mysqli_query($conn,$sql);
 	$row=mysqli_fetch_assoc($result);
 	$photo=$row['photo'];
 	$collegeid=$row['collegeid'];
 	$sql1="SELECT * FROM (SELECT courseid FROM college INNER JOIN coursesoffered ON college.collegeid = coursesoffered.collegeid where college.collegeid='$collegeid')as t INNER JOIN course ON t.courseid=course.courseid order by course.duration ASC;";
 	$result1=mysqli_query($conn,$sql1);
 	$sql2="SELECT * FROM (SELECT * FROM cutoff WHERE collegeid='$collegeid') as t INNER JOIN course on t.courseid=course.courseid ORDER BY t.category ASC;";
 	$result2=mysqli_query($conn,$sql2);

 	?>
 	<div style="height:8px;"></div>
 	<div> 
           <img src="<?php echo $photo?>" alt="<?php echo $row['name']?>"class="mx-auto d-block"  style="
              background-color: white;
              border-style: solid;
              border-width: 2px;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              width:200px;
           ">
        <div style="height: 17px"></div>
        <div  style="width:   800px;background-color: white;border:1px solid black;
        margin:auto;">
        <div style="padding: 40px">
        	  
              <h2  class="cp-clg-h">ABOUT</h2><hr>
 	          <label>Name : </label><?php echo $row['name'] ?><br>
 		      <label>Location : </label><?php echo $row['location'] ?><br>
        
        <div style="height: 40px"></div>     	
 		<h2  class="cp-clg-h">COURSES OFFERED</h2><hr>
 		<table  class="table table-striped">
 			  <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Duration(in years)</th>
                  <th scope="col">Degree</th>
                </tr>
              </thead>

 			<?php $cnt=1;
 			while($row1=mysqli_fetch_assoc($result1)){
 				$name=$row1['name'];$duration=$row1['duration'];$degree=$row1['degree'];
 				echo "<tr>
 				<td>$cnt</td>
 				<td>$name</td>
 				<td>$duration</td>
 				<td>$degree</td>
 				</tr>";
 				$cnt++;
 			}

 			?>
 		</table>

 	   <div style="height: 40px"></div>  
 	<div>
 		<h2  class="cp-clg-h">CUT OFFs</h2><hr>
        <table  class="table table-striped">
 			  <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Degree</th>
                  <th scope="col">Year</th>
                  <th scope="col">Category</th>
                  <th scope="col">Open</th>
                  <th scope="col">Close</th>
                </tr>
              </thead>

 			<?php $cnt=1;
 			while($row2=mysqli_fetch_assoc($result2)){
 				$name=$row2['name'];$year=$row2['year'];$degree=$row2['degree'];
 				$open=$row2['open'];$close=$row2['close'];$cat=$row2['category'];
 				echo "<tr>

 			    <td>$cnt</td>
 				<td>$name</td>
 				<td>$degree</td>
 				<td>$year</td>
 				<td>$cat</td>
 				<td>$open</td>
 				<td>$close</td>
 				</tr>";
                $cnt++;
 			}
                
 			?>
 		</table>





 	</div>










        </div>
 		
 	
 	<?php
 	exit();
 }
 ?>
 











 <section>
 	<div >
 		<h2>Colleges</h2>

 		<form action="college.php" method="GET" style="width: 500px;margin:auto">
 			
 					<div class="form-group">
 						<label>Select College : </label>	
 						<select class="form-control" name="college" >
 							<option value="" disabled selected>Select your option</option>
 							<?php 
 							$sql="SELECT * from college;";
 							$result=mysqli_query($conn,$sql);
 							while($row=mysqli_fetch_assoc($result)){
 								$name=$row['name'];
 								echo "<option value='$name'>$name</option>";
 							}
 							?>
 						</select>  
 					</div> 
 					<button type="submit" name="submit" class="btn btn-light">SUBMIT</button>
 		</form>










 	</div>
 </section>     

 <?php
 include_once 'footer.php';
 ?>      

