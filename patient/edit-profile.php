<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM patient where patient_ID = '$id'");
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patient | Edit Profile</title>
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
				<input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $row['pFullName']; ?>" v>
				
				<label>Username</label>
				<input type="text" placeholder="Enter Username" name="username" value="<?php echo $row['pUsername']; ?>" required>
				
				<label>Email</label>
				<input type="email" placeholder="Enter Email" name="email" value="<?php echo $row['pEmail']; ?>" required>
				
				<label>Cellphone Number</label>
				<input type="text" placeholder="Enter Cellphone Number" name="number" value="<?php echo $row['pNumber']; ?>" required>
				
				<label>Address</label>
				<input type="text" placeholder="Enter Complete Address" name="address" value="<?php echo $row['pAddress']; ?>" required>
				
				<label>Gender</label>
				<select name="gender" required>
				<option value="<?php echo $row['pGender']; ?>"><?php echo $row['pGender']; ?></option>
				<option value="Male">Male</option>	
				<option value="Female">Female</option>	
				<option value="Other">Other</option>
				</select>
				
				<label>Age</label>
				<input type="number" name="age" value="<?php echo $row['pAge']; ?>" required>
				
				<label>Birthday</label>
				<input type="date" name="bday" value="<?php echo $row['pBirthday']; ?>" required>
				
				<label>Profile Picture</label>
				<input type="file" name="pic" value="<?php echo $row['pProfilepic']; ?>" required>
				
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
			$gender		= $_POST['gender'];
			$age		= $_POST['age'];
			$birthday	= $_POST['bday'];
			$profpic	= $_POST['pic'];
	
		$query = "UPDATE patient SET pFullName = '$fullname', pUsername = '$username',
		pEmail = '$email', pNumber = '$number', pAddress = '$address', pGender = '$gender',
		pAge = '$age', pBirthday = '$birthday', pProfilepic = '$profpic' WHERE patient_ID = '$id'";
	
		$result = mysqli_query($conn, $query);
	?>
		<script type="text/javascript">
		alert("Update Succesful.");
		window.location = "home.php";
		</script>
	<?php } ?>