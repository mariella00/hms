n<?php
session_start();
include("../include/config.php");

	if(isset($_POST['fpass'])){
		$cnum=$_POST['number'];
		$email=$_POST['email'];
		$query=mysqli_query($conn,"select nurse_ID from nurse where nNumber='$cnum' and nEmail='$email'");
		$row=mysqli_num_rows($query);
	
	if($row>0){
		$_SESSION['number']=$cnum;
		$_SESSION['email']=$email;
		header('location:reset-pass.php');}
		
	else {
		echo "<script>alert('Invalid details. Try again.');</script>";
		echo "<script>window.location.href ='fpass.php'</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="logreg-style.css">
		<title>Nurse | Forgot Password</title>
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
	
	<form action="fpass.php" method="post">
		<div class="panel">
			<div class="login-info-box">
				<h3>Already have an account?</h3><br><br>
				<a href="login.php" id="reg">LOGIN</a>
			</div>
		<div class="white-panel">
				<h3>PASSWORD RECOVERY</h3><br>
				<h5>Enter your  Contact number and Email to recover your password.</h5>
				<br>
				<input type="text" placeholder="Contact Number" name="number">
				<input type="email" placeholder="Email" name="email">
				
				<input type="submit" class="btn" value="SUBMIT" name="fpass"/>
				
		</div>
		</div>
	</form>
	</body>
	
</html>