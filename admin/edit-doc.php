<?php
	session_start();
	include("../include/config.php");
	$did = intval($_GET['id']);
	
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
	
		$sql=mysqli_query($conn,"UPDATE doctor SET dFullName = '$fullname', dUsername = '$username', dEmail = '$email', dNumber = '$number', dAddress = '$address', dSpecialization = '$specialize', dGender = '$gender', dAge = '$age', dBirthday = '$birthday' WHERE doctor_ID = '$did'");
	
			if($sql){
				echo "<script>alert('Update Succesful');</script>";
			} 
		}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | Edit Doctor</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
		<div class="wrapper" id="wrapper">
			<div class="top_navbar">
				<div class="menu">
					<div class="logo">COVID19 Hospital Management System</div>
					<li><a href="home.php">Home</a>
					<a href="../include/logout.php" onClick="return confirm('Are you sure you want to logout?')">Logout</a></li>
				</div>
			</div>
			<p>ADMINISTRATOR&nbsp <small>EDIT DOCTOR</small></p>
			<hr>
			<br><br>
			
<div class="dfrm">			
	<form role="form" name="adddoc" method="post" onSubmit="return valid();">
	
				<?php $sql=mysqli_query($conn,"select * from doctor where doctor_ID ='$did'");
					while($data=mysqli_fetch_array($sql)){ ?>
					
				<br><br><br>
				<label>FULL NAME</label>
				<input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $data['dFullName']; ?>" required><br>
				
				<label>USERNAME</label>
				<input type="text" placeholder="Enter Username" name="username" value="<?php echo $data['dUsername']; ?>" required><br>
				
				<label>EMAIL</label>
				<input type="email" placeholder="Enter Email" name="email" value="<?php echo $data['dEmail']; ?>" required><br>
				
				<label>CELLPHONE NUMBER</label>
				<input type="text" placeholder="Enter Cellphone Number" name="number" value="<?php echo $data['dNumber']; ?>" required><br>
				
				<label>ADDRESS</label>
				<input type="text" placeholder="Enter Complete Address" name="address" value="<?php echo $data['dAddress']; ?>" required><br>
				
				<label>SPECIALIZATION</label>
				<select name="specialize" required>
				<option value="<?php echo $data['dSpecialization']; ?>"><?php echo $data['dSpecialization']; ?></option>
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
				
				<label>GENDER</label>
				<select name="gender" required>
				<option value="<?php echo $data['dGender']; ?>"><?php echo $data['dGender']; ?></option>
				<option value="Male">Male</option>	
				<option value="Female">Female</option>	
				<option value="Other">Other</option>
				</select><br>
				
				<label>AGE</label>
				<input type="number" name="age" value="<?php echo $data['dAge']; ?>" required><br>
				
				<label>BIRTHDAY</label>
				<input type="date" name="bday" value="<?php echo $data['dBirthday']; ?>" required><br>
				
				<br><br>
				<input type="submit" class="fbtn" value="UPDATE" name="epbtn"/>
				<br><br><br>
				
				<?php } ?>
				</div>
				
			<br><br><br><br><br>		
		</div>	
	</form>		
	</body>	
</html>