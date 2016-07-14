<! DOCTYPR html>

<html>
	<head>
		<title>
			Registration
		</title>
		<link rel="stylesheet" href="style.css" media="all" />
	</head>
	
	
<body>
	<div id="form">
		<form method='post' action='user_registration.php'>
			<h3>Student from</h3>
			<label>Student name</label>
			<input type="text" name="user_name" placeholder="Enter name"/>
			<label>Father name</label>
			
			<input type="text" name="father_name" placeholder="Enter father name"/>
			<label>School name</label>
			<input type="text" name="school_name" placeholder="Enter school name"/>
			<label>Roll No</label>
			<input type="text" name="roll_no" placeholder="Enter roll no"/>
			<label>Class</label>
			<select name="student_class">
			<option value="null">Select class</option>
			<option value="10th">10th</option>
			<option value="9th">9th</option>
			</select>
			<input type='submit' name='submit' value='Registor'>
		</form>
		
	</div>	
</body>
</html>
<?php
$conn = mysql_connect("localhost","root","");
$db = mysql_select_db('students',$conn);

	if(isset($_POST['submit'])){
		
		$student_name=$_POST['user_name'];
		$student_father=$_POST['father_name'];
		$student_school=$_POST['school_name'];
		$student_roll=$_POST['roll_no'];
		$student_class=$_POST['student_class'];
		
		$query = "insert into u_reg (u_name,u_father,u_school,u_roll,u_class) values 
		('$student_name','$student_father','$student_school','$student_roll','$student_class')";
		
		if(mysql_query($query)){
			echo "<font style=' width=100px; text-align:center;  color:white;'> 
			Congrulation, $student_name registration complete. </font>";
		}
	}


?>