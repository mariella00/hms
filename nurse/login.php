<?php
	session_start();
	include("../include/config.php");

if(isset($_POST['login'])){	
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	$query = mysqli_query($conn, "SELECT * FROM nurse WHERE nUsername = '$username'
			AND nPassword = '$password'");
			
	$num_rows = mysqli_num_rows($query);
	$row = mysqli_fetch_array($query);
	$_SESSION["id"] = $row['nurse_ID'];
	
	if ($num_rows > 0){
		header("Location: home.php");
		?>
		<?php
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
		<link rel="stylesheet" href="logreg-style.css">
		<title>Nurse | Login</title>
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
	
		<div class="alert2">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			 <strong>ALERT: </strong> <?php echo $_SESSION['status']; ?>
		</div>
	<?php
	unset($_SESSION['status']);
	}
	?>
	
		<div class="login-info-box">
			 <h3>Doesn't have an account?</h3><br><br>
			 <a href="register.php" id="reg">REGISTER</a>
		</div>
			
		<div class="white-panel">
				<h1>LOGIN</h1>
				<h5>Fill in your credentials to log in.</h5>
				<br>
				<input type="text" placeholder="Username" name="user">
				<input type="password" placeholder="Password" name="pass">
				
				<a href="fpass.php" id="fpass">Forgot password?</a>
				<input type="submit" class="btn" value="SUBMIT" name="login"/>
				
		</div>
		</div>
	</form>
	
	</body>
	
</html>