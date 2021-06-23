<?php
include("../include/config.php");
session_start();

if(isset($_POST['login'])){	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	

	$sql = "SELECT * FROM admin WHERE username = '$username'
			AND password = '$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$count = mysqli_num_rows($result);
	
		if ($count == 1){
			$_SESSION['username'] = $username;
			header("location: home.php");
		}
		else{
			$_SESSION['status']="Incorrect username/password.";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles.css">
		<title>Admin | Login</title>
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
	
	<form action="login.php" method="post">
	
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
			<div class="login-info-box">
			 <h3>ADMINISTRATOR ACCOUNT</h3><br><br>
			</div>
			
		<div class="white-panel">
				<h1>LOGIN</h1>
				<h5>Fill in your credentials to log in.</h5>
				<br>
				<input type="text" placeholder="Username" name="username">
				<input type="password" placeholder="Password" name="password">
				
				<a href="#" id="fpass">Forgot password?</a>
				<input type="submit" class="btn" value="SUBMIT" name="login"/>
				
		</div>
		
		</div>
		
	</form>
	
	</body>
	
</html>