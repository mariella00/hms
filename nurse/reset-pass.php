<?php
session_start();
include("../include/config.php");

	if(isset($_POST['change'])){
		$cnum	=$_SESSION['number'];
		$email	=$_SESSION['email'];
		$npass	=$_POST['pass'];
		$cpass	=$_POST['cpass'];
		
		$query=mysqli_query($conn,"update nurse set nPassword='$npass' where nNumber='$cnum' and nEmail='$email'");
		
		if ($query){
			if ($npass != $cpass){
				echo "<script>alert('Password does not matched.');</script>";
				echo "<script>window.location.href ='reset-pass.php'</script>";
			}
			else{
				echo "<script>alert('Password successfully updated.');</script>";
				echo "<script>window.location.href ='login.php'</script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="logreg-style.css">
		<title>Nurse | Reset Password</title>
	</head>
	
	<body>
	<header>
		<img class="hms-logo" src="../img/logo.png">	
		<nav>
			<ul class="nav_links">
				<li><a href="../index.html">HOME</a></li>
				<li><a href="../info.html">COVID19 INFO</a></li>
				<li><a href="../about.html">ABOUT US</a></li>
			</ul>
		</nav>
	</header>
	
	<form action="reset-pass.php" method="post">
		<div class="panel">
			<div class="reg-info-box">
				<h3>Already have an account?</h3><br><br>
				<a href="login.php" id="reg">LOGIN</a>
			</div>
		<div class="white-panel2">
		<h3>RESET PASSWORD</h3>
		<h5>Set a new password.</h5><br>
		
				<input type="password" placeholder="Password" name="pass" required>
				<input type="password" placeholder="Confirm Password" name="cpass" required>
				
				<input type="submit" class="btn" value="SUBMIT" name="change"/>
		</div>
		</div>
	</form>
	</body>
	
</html>