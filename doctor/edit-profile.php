<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM doctor where doctor_ID = '$id'");
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Doctor | Edit Profile</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	<form action="edit-profile.php" method="post">
			
	<h3>EDIT PROFILE</h3>
	<hr>
		<div class="dfrm">
				<label>Full Name</label>
				<input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $row['dFullName']; ?>" required><br>
				
				<label>Username</label>
				<input type="text" placeholder="Enter Username" name="username" value="<?php echo $row['dUsername']; ?>" required><br>
				
				<label>Email</label>
				<input type="email" placeholder="Enter Email" name="email" value="<?php echo $row['dEmail']; ?>" required><br>
				
				<label>Cellphone Number</label>
				<input type="text" placeholder="Enter Cellphone Number" name="number" value="<?php echo $row['dNumber']; ?>" required><br>
				
				<label>Address</label>
				<input type="text" placeholder="Enter Complete Address" name="address" value="<?php echo $row['dAddress']; ?>" required><br>
				
				<label>Specialization</label>
				<select name="specialize" required>
				<option value="<?php echo $row['dSpecialization']; ?>"><?php echo $row['dSpecialization']; ?></option>
				<option value="Allergists/Immunologists">Allergists/Immunologists</option>	
				<option value="Cardiologists">Cardiologists</option>	
				<option value="Dermatologists">Dermatologists</option>
				<option value="General Physicians">General Physicians</option>
				<option value="Infectious Disease Specialists">Infectious Disease Specialists</option>
				<option value="Neurologists">Neurologists</option>
				<option value="Obstericians/Gynecologists">Obstericians/Gynecologists</option>
				<option value="Ophtalmologists">Ophtalmologists</option>
				<option value="Pediatricians">Pediatricians</option><option value="Psychiatrists">Psychiatrists</option>
				</select><br>
				
				<label>Gender</label>
				<select name="gender" required>
				<option value="<?php echo $row['dGender']; ?>"><?php echo $row['dGender']; ?></option>
				<option value="Male">Male</option>	
				<option value="Female">Female</option>	
				<option value="Other">Other</option>
				</select><br>
				
				<label>Age</label>
				<input type="number" name="age" value="<?php echo $row['dAge']; ?>" required><br>
				
				<label>Birthday</label>
				<input type="date" name="bday" value="<?php echo $row['dBirthday']; ?>" required><br>
				
				<label for="">Profile Picture</label>
				<input type="file" name="pic" value="<?php echo $row['dProfilepic']; ?>" required><br>
				
				<br><br>
				<input type="submit" class="fbtn" value="UPDATE" name="epbtn"/>
				<br><br><br>
			</div>
	</form>
	</div>
	<br><br><br><br><br>
	</body>
	
</html>

	<?php
		if(isset($_POST['epbtn'])){
			$fullname	= $_POST['fullname'];
			$username	= $_POST['username'];
			$email		= $_POST['email'];
			$number		= $_POST['number'];
			$address	= $_POST['address'];
			$specialize	= $_POST['specialize'];
			$gender		= $_POST['gender'];
			$age		= $_POST['age'];
			$birthday	= $_POST['bday'];
			$profpic	= $_POST['pic'];
	
		$query = "UPDATE doctor SET dFullName = '$fullname', dUsername = '$username',
		dEmail = '$email', dNumber = '$number', dAddress = '$address', dSpecialization = '$specialize', dGender = '$gender',
		dAge = '$age', dBirthday = '$birthday', dProfilepic = '$profpic' WHERE doctor_ID = '$id'";
	
		$result = mysqli_query($conn, $query);
	?>
		<script type="text/javascript">
		alert("Update Succesful.");
		window.location = "home.php";
		</script>
	<?php } ?>