<?php
	session_start();
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Login</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>
<form class="box login" action='veiw.php' method='post'> 
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" name='admin_name' tabindex="1" placeholder="Enter user name" required>
	  <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" name='admin_pass' tabindex="2" required>
	</fieldset>
	<footer>
	  <label><input type="checkbox" tabindex="3">Keep me logged in</label>
	  <input type="submit" name='login' class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
<center><?php echo $_GET['error']; ?></center>
</body>
</html>
<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db('students',$conn);

	if(isset($_POST['login'])){
		
		$admin_name = $_SESSION['admin_name'] = $_POST['admin_name'];
		$admin_pass = $_POST['admin_pass'];
		
		
		
		$query = "select * from login1 where user_name='$admin_name' AND user_password='$admin_pass' ";
		
		$run = mysql_query($query);
		
		if(mysql_num_rows($run)==1){
			
			echo "<script>window.open('veiw.php?logged=Login Successfully','_self')</script>";
		}
		
		else{
			echo "<script>alert('Username or Password incorrect.!')</script>";
		}
	}

?>	