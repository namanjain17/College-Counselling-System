<?php 
include_once 'header.php';
include_once 'includes/dbh-inc.php';
if(!isset($_SESSION['email'])||$_SESSION['email']!="admin@dbms.com"){
	header("Location: college.php?college=$collegename&submit=&error=not_admin");
	exit();
}
if(!isset($_GET['collegename'])){
	header("Location: college.php?error=empty");
	exit();
}
$collegename=$_GET['collegename'];
$sql="SELECT * from college where name=\"$collegename\";";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
	header("Location: college.php?college=$collegename&submit=&error=wrong%20college%20name");
	exit();
}
$row=mysqli_fetch_assoc($result);
$collegeid=$row['collegeid'];
if(isset($_POST['submit'])){ 
	$degree=$_POST['degree'];
	$coursename=$_POST['coursename'];
	$sql="SELECT * from course where name=\"$coursename\" AND degree=\"$degree\";";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0){
		$error="Course not offered by the college";
		header("Location: college.php?college=$collegename&submit=&error=$error");
		exit();
	}
	$row=mysqli_fetch_assoc($result);
	$courseid=$row['courseid'];
	$open=$_POST['open'];
	$close=$_POST['close'];
	$category=$_POST['category'];
	$year=$_POST['year'];
	if(empty($open)||empty($close)||empty($category)||empty($year)||empty($coursename)){
		 header("Location: college.php?college=$collegename&submit=&error=Empty%20Fields%20not%20allowed");
		 exit();
	}
	$sql="INSERT INTO cutoff(collegeid,courseid,category,year,open,close) VALUES ($collegeid,$courseid,\"$category\",$year,$open,$close);";

	$result = mysqli_query($conn,$sql);
	if(!$result){
		$error=mysqli_error($conn);
		header("Location: college.php?college=$collegename&submit=&error=$error");
		exit();
	}
	header("Location: college.php?college=$collegename&submit=&update=success");
	  exit();
}


?>

<div style="height:8px;"></div>
<div style="width:   800px;background-color: white;border:1px solid black;margin:auto;">
	<div style="padding: 40px">
		<h2  class="cp-clg-h">Add Cutoff</h2><hr>	
		<form action="college-cutoff-update.php?collegename=<?php echo $collegename?>"  method="POST" style="width: 500px;margin:auto"> 			
			<div class="form-group">
				<label>Course Name : </label>	
				<input type="text" name="coursename" class="form-control" placeholder="Enter coursename"> <br>
				<label> Year: </label>	
				<input type="text" name="year" class="form-control" placeholder = "Enter Year"><br> 
				<label>Course Type : </label>	
				<select name="degree" class="form-control">
					<option value="BTECH">BTECH</option>
					<option value="MTECH">MTECH</option>
					<option value="BTECH+MTECH">BTECH+MTECH</option>
					<option value="Bsc">Bsc</option>
					<option value="Bsc+Msc">Bsc+Msc</option>
				</select><br>
				<label>Category : </label>	
				<select name="category" class="form-control">
					<option value="general">General</option>
					<option value="obc">OBC</option>
				</select><br>
				<label>Open : </label>
				<input type="text" name="open" class="form-control" placeholder="Enter Opening Rank"> <br>
				<label>Close : </label>
				<input type="text" name="close" class="form-control" placeholder="Enter Closing Rank"> <br>
			</div> 
			<button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" >SUBMIT</button>
		</form>
	</div>
</div>
