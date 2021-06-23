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
			$gender		= $_POST['gender'];
			$age		= $_POST['age'];
			$birthday	= $_POST['bday'];
	
		$sql=mysqli_query($conn,"UPDATE patient SET pFullName = '$fullname', pUsername = '$username', pEmail = '$email', pNumber = '$number', pAddress = '$address', pGender = '$gender', pAge = '$age', pBirthday = '$birthday' WHERE patient_ID = '$did'");
	
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
		<title>Admin | Edit Patient</title>
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
			<p>ADMINISTRATOR&nbsp <small>EDIT PATIENT</small></p>
			<hr>
			<br><br>
			<div class="dfrm">
			
	<form role="form" name="adddoc" method="post" onSubmit="return valid();">
	
				<?php $sql=mysqli_query($conn,"select * from patient where patient_ID ='$did'");
					while($data=mysqli_fetch_array($sql)){ ?>
					
				<br><br><br>
				<label>FULL NAME</label>
				<input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $data['pFullName']; ?>" required><br>
				
				<label>USERNAME</label>
				<input type="text" placeholder="Enter Username" name="username" value="<?php echo $data['pUsername']; ?>" required><br>
				
				<label>EMAIL</label>
				<input type="email" placeholder="Enter Email" name="email" value="<?php echo $data['pEmail']; ?>" required><br>
				
				<label>CELLPHONE NUMBER</label>
				<input type="text" placeholder="Enter Cellphone Number" name="number" value="<?php echo $data['pNumber']; ?>" required><br>
				
				<label>ADDRESS</label>
				<input type="text" placeholder="Enter Complete Address" name="address" value="<?php echo $data['pAddress']; ?>" required><br>
				
				<label>GENDER</label>
				<select name="gender" required>
				<option value="<?php echo $data['pGender']; ?>"><?php echo $data['pGender']; ?></option>
				<option value="Male">Male</option>	
				<option value="Female">Female</option>	
				<option value="Other">Other</option>
				</select><br>
				
				<label>AGE</label>
				<input type="number" name="age" value="<?php echo $data['pAge']; ?>" required><br>
				
				<label>BIRTHDAY</label>
				<input type="date" name="bday" value="<?php echo $data['pBirthday']; ?>" required><br>
				
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