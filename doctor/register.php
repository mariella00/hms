<?php
	session_start();
	include("../include/config.php");

	if(isset($_POST['register'])){
		$fullname 	= 	$_POST['fullname'];
		$username 	= 	$_POST['reg-user'];
		$email 		= 	$_POST['email'];
		$cnum 		= 	$_POST['number'];
		$password 	= 	$_POST['reg-pass'];
		$cpass 		= 	$_POST['cpass'];
		
		
		$username_sql = "SELECT * FROM doctor WHERE dUsername = '$username'";
		$check_user = mysqli_query($conn,$username_sql);
				
		$email_sql = "SELECT * FROM doctor WHERE dEmail = '$email'";
		$check_email = mysqli_query($conn,$email_sql);

		
		if (mysqli_num_rows($check_user) > 0){
			$_SESSION['status']="Username is already used.";
		}
		else{
			if (mysqli_num_rows($check_email) > 0){
			$_SESSION['status']="Email is already used.";
			}
			else{
				if($password == $cpass){
				$reg_sql = "INSERT INTO doctor (dFullName, dUsername, dEmail,
				dNumber, dPassword) VALUES ('".$fullname."','".$username."','".$email."','".$cnum."','".$password."')";
				$check_reg = mysqli_query($conn,$reg_sql);
			
				if($check_reg){
					$_SESSION['status']="Registration completed, you can now login";
					}
					else{
					$_SESSION['status']="ERROR while saving the data. Try again.";
					}
				}
				else{$_SESSION['status']="Password doesn't matched.";
				}
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

		<title>Doctor | Register</title>
	</head>
	
	<body>
			
	<header>
		<img class="hms-logo" src="../img/logo.png">	
		<nav>
			<ul class="nav_links">
				<li><a href="../index.html">HOME</a></li>
				<li><a href="../info.html">COVID19 INFO</a></li>
			</ul>
		</nav>
	</header>
	
	<form action="register.php" method="post">
		<div class="panel">
			<?php 
			if(isset($_SESSION['status']) && $_SESSION['status'] !=""){
			?>
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				 <strong>ALERT: </strong> <?php echo $_SESSION['status']; ?>
			</div>
			<?php
			unset($_SESSION['status']);
			}
			?>
		<div class="reg-info-box">
			 <h3>Already have an account?</h3><br><br>
			 <a href="login.php" id="reg">LOGIN</a>
			</div>
		
		<div class="white-panel2">
		<h1>REGISTER</h1>
		<h5>Fill up the form to create an account.</h5>
		
				<input type="text" placeholder="Fullname" name="fullname" required>
				<input type="text" placeholder="Username" name="reg-user" required>
				<input type="email" placeholder="Email" name="email" required>
				<input type="text" placeholder="Contact Number" name="number" required pattern="[0-9]{10,11}">
				<input type="password" placeholder="Password" name="reg-pass" required>
				<input type="password" placeholder="Confirm Password" name="cpass" required>
				
				<input type="submit" class="btn" value="SUBMIT" name="register"/>
		</div>
		
		</div>
	</form>
	
	</body>
	
</html>

