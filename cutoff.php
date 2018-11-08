<?php 
include_once 'header.php';
include_once 'includes/dbh-inc.php';
?>

<section class="container">
	<div class="one">
		<div style="height:8px;"></div>
		<div style="padding: 40px">
			<h2  class="cp-clg-h">Filters</h2><hr>
			<label class="cp-clg-s">Select colleges : </label>
			<form action="cutoff.php" method="POST">
				<?php 
				$sql="SELECT DISTINCT name from college;";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
					$c=$row['name'];
					echo "<input type=\"checkbox\" name=\"colleges[]\" value=\"$c\"> $c<br>";
				}

				?>
				<label class="cp-clg-s">Select course names: </label><br>
				<?php 
				$sql="SELECT DISTINCT name from course;";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
					$c=$row['name'];
					echo "<input type=\"checkbox\" name=\"course_name[]\" value=\"$c\"> $c<br>";
				}

				?>    
				<label class="cp-clg-s">Select course type: </label><br>
				<?php 
				$sql="SELECT DISTINCT degree from course;";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
					$c=$row['degree'];
					echo "<input type=\"checkbox\" name=\"course_degree[]\" value=\"$c\"> $c<br>";
				}

				?> 
				<label class="cp-clg-s">Select Category: </label><br>
				<?php 
				$sql="SELECT DISTINCT category from cutoff;";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
					$c=$row['category'];
					echo "<input type=\"checkbox\" name=\"category[]\" value=\"$c\"> $c<br>";
				}

				?> 
				<div style="height:8px;"></div>
				<button type="submit" name="submit">Apply</button>
			</form>
		</div>

	</div>
	<div class="two">
		<div style="height:8px;"></div>
		<div style="width: 100%;background-color: white">
			<div style="padding: 40px">
				<h2  class="cp-clg-h">CUTOFFs</h2><hr>
				<?php 
				if(isset($_POST['submit'])){
					$college_name="(";
					$course_name="(";
					$course_degree="(";
					$category="(";
					$final="";
					if(isset($_POST['colleges'])){
						for ($a=0; $a < count($_POST['colleges']); $a++) { 
						   $college_name.="\"".$_POST['colleges'][$a]."\"";
						   $college_name.=($a==count($_POST['colleges'])-1?")":",");
					    }
					    if($final!="") $final.="AND ";
					    $final.="college.name in $college_name ";
					}
                    if(isset($_POST['course_name'])){
						for ($a=0; $a < count($_POST['course_name']); $a++) { 
						   $course_name.="\"".$_POST['course_name'][$a]."\"";
						   $course_name.=($a==count($_POST['course_name'])-1?")":",");
					    }
					    if($final!="") $final.="AND ";
					    $final.="course.name in $course_name ";
					}
                    if(isset($_POST['course_degree'])){
						for ($a=0; $a < count($_POST['course_degree']); $a++) { 
						   $course_degree.="\"".$_POST['course_degree'][$a]."\"";
						   $course_degree.=($a==count($_POST['course_degree'])-1?")":",");
					    }
					    if($final!="") $final.="AND ";
					    $final.="course.degree in $course_degree ";
					}
                    if(isset($_POST['category'])){
						for ($a=0; $a < count($_POST['category']); $a++) { 
						   $category.="\"".$_POST['category'][$a]."\"";
						   $category.=($a==count($_POST['category'])-1?")":",");
					    }
					    if($final!="") $final.="AND ";
					    $final.="cutoff.category in $category ";
					}
					
				   
					$sql="SELECT course.name as course_name,college.name as college_name,category,course.degree as degree,open,close from cutoff INNER JOIN college ON cutoff.collegeid=college.collegeid INNER JOIN course ON  cutoff.courseid = course.courseid where $final;";echo $sql;
					$result=mysqli_query($conn,$sql);?>

					<table  class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Course Name</th>
								<th scope="col">College Name</th>
								<th scope="col">Category</th>
								<th scope="col">Degree</th>
								<th scope="col">Open</th>
								<th scope="col">close</th>
							</tr>
						</thead>

						<?php $cnt=1;
						while($row=mysqli_fetch_assoc($result)){
							$college_name=$row['college_name'];$degree=$row['degree'];$course_name=$row['course_name'];$category=$row['category'];$open=$row['open'];$close=$row['close'];
							echo "<tr>
							<td>$cnt</td>
							<td>$course_name</td>
							<td>$college_name</td>
							<td>$category</td>
							<td>$degree</td>
							<td>$open</td>
							<td>$close</td>
							</tr>";
							$cnt++;
						}

						?>
					</table>

					<?php		
				}
				?>  









			</div>
		</div>

	</div>
</section>
</div>
</section>  