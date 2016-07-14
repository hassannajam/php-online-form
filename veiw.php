
<html>
	<head>
		<title>	Veiw Record
		</title>
		<link rel="stylesheet" href="style_ad.css" media="all" />
		
		
		
	</head>
	
<body>
		<center><font color='red' size='6'><?php echo @$_GET['deleted']; ?></font></center>
		<center><font color='red' size='6'><?php echo @$_GET['updated']; ?></font></center>
		<center><font color='red' size='6'><?php echo @$_GET['logged']; ?></font></center>
	
		<div id="tab">
			<div id="heading">
			<label> PANEL: Create/Add</label>
			
			</div>
			<div>
				<a href='user_registration.php' class="myButton" >Insert New Record</a>
			</div>
			
			<div>
				<a href='logout.php' class="myButton">Logout</a>
			</div>
		</div>
<table>
		
  <thead>
    <tr>
      <th>S_No.</th>
      <th>StudentName</th>
      <th>FatherName</th>
      <th>Roll No</th>
      <th>Delete</th>
      <th>Edit</th>
      <th>Details</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
	<?php
	
		$conn = mysql_connect("localhost","root","");
		$db = mysql_select_db('students',$conn);
		
		$query = "select * from u_reg order by 1 DESC";
		
		$run = mysql_query($query);
	
		$i=1;
		
		while($row = mysql_fetch_array($run))
		{
			$u_id = $row ['u_id'];
			$u_name = $row [1];
			$u_father = $row [2];
			$u_roll = $row [4];
		
	
	?>
      <td><?php echo $i; $i++; ?></td>
      <td><?php echo $u_name; ?></td>
      <td><?php echo $u_father; ?></td>
      <td><?php echo $u_roll; ?></td>
      <td><a href='delete.php?del=<?php echo $u_id; ?>'>Delete</a></td>
      <td><a href='edit.php?edit=<?php echo $u_id; ?>'>Edit</a></td>
      <td><a href='veiw.php?details=<?php echo $u_id; ?>'>Details</a></td>
	  
    </tr>
   
<?php } ?>  
 
  </tbody>

  
  </table>
  
  <?php
	$record_details = @$_GET['details'];
	
	$query = "select * from u_reg where u_id='$record_details' ";
	
	$run1= mysql_query($query);
	
	while($row1= mysql_fetch_array($run1))
	{
		$name = $row1[1];
		$father = $row1[2];
		$school = $row1[3];
		$roll = $row1[4];
		$class = $row1[5];
  
  ?>
  <br>
  
   
 
  <table>
	<thead>
		<tr >
		  <th colspan='6' align='center' >All student detail</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $name; ?></td>
			<td><?php echo $father; ?></td>
			<td><?php echo $school; ?></td>
			<td><?php echo $roll; ?></td>
			<td><?php echo $class; ?></td>
		</tr>
		
<?php }?>

	</tbody>

	
  </table>
  <br>
 <form action='veiw.php' method='get'>
	Search Record:<input type='text' name='search'>
	<input type='submit' name='submit' value='Find Now'>
	
  </form>
  <?php 
	if(isset($_GET['search'])){
		$search_record = $_GET['search'];
		
		$query2 = "select * from u_reg where u_name='$search_record' OR u_roll = '$search_record'";
		
		$run2 = mysql_query($query2);
		
		while ($row2=mysql_fetch_assoc($run2))
		{
			$name123=$row2['u_name'];
			$father123=$row2['u_father'];
			$school123=$row2['u_school'];
			$roll123=$row2['u_roll'];
			$class123=$row2['u_class'];  
  ?>
  <br>
    <table>
	<thead>
		<tr >
		  <th colspan='6' align='center' >Search record</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $name123; ?></td>
			<td><?php echo $father123; ?></td>
			<td><?php echo $school123; ?></td>
			<td><?php echo $roll123; ?></td>
			<td><?php echo $class123; ?></td>
		</tr>
		
		<?php }}?>

	</tbody>

	
  </table>
  
</body>	
	
</html>