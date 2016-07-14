<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db('students',$conn);
	
	$edit_record = @$_GET['edit'];
	
	$query = "select * from u_reg where u_id = '$edit_record' ";

	$run = mysql_query($query);
	
	while ($row = mysql_fetch_array($run))
	{
		$edit_id = $row['u_id'];
		$s_name = $row[1];
		$s_father = $row[2];
		$s_school = $row[3];
		$s_roll = $row[4];
		$s_class = $row[5];
	}

?>
<! DOCTYPR html>

<html>
	<head>
		<title>
			Update Record
		</title>
		<link rel="stylesheet" href="style.css" media="all" />
	</head>
	
	
<body>
	<div id="form">
		<form method='post' action='edit.php?edit_from=<?php echo $edit_id; ?>'>
			<h3>Updating form</h3>
			
			<label>Student name</label>
			<input type="text" name="user_name1" placeholder="Update name" value='<?php echo $s_name; ?>' />
			
			<label>Father name</label>	
			<input type="text" name="father_name1" placeholder="Update father name" value='<?php echo $s_father; ?>' />
			
			<label>School name</label>
			<input type="text" name="school_name1" placeholder="Update school name" value='<?php echo $s_school; ?>'/>
			
			<label>Roll No</label>
			<input type="text" name="roll_no1" placeholder="Update roll_no" value='<?php echo $s_roll; ?>' />
			
			<label>Class</label>
			<select name="student_class1" >
			<option value='<?php echo $s_class; ?>'><?php echo $s_class; ?></option>
			<option value="10th">10th</option>
			<option value="9th">9th</option>
			</select>
			
			<input type='submit' name='update' value='Update record'>
		
		</form>
		
	</div>	
</body>
</html>

<?php
	if(isset($_POST['update'])){
		
		$edit_record1 = $_GET['edit_from'];
		$student_name = $_POST['user_name1'];
		$student_father = $_POST['father_name1'];
		$student_school = $_POST['school_name1'];
		$student_roll = $_POST['roll_no1'];
		$student_class = $_POST['student_class1'];
		
		$que = " update u_reg set u_name = '$student_name', 
		u_father = '$student_father', u_school = '$student_school', u_roll='$student_roll',
		u_class='$student_class' where u_id='$edit_record1' ";
		
		if(mysql_query($que)){
			
			echo "<script>window.open('veiw.php?updated=Record Updated ','_self')</script>";
		}
	}
	
?>