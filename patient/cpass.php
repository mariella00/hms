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
		<title>Patient | Change Password</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	<form action="cpass.php" method="post">
			
		<h3>CHANGE PASSWORD</h3>
		<hr>
			<div class="dfrm">
				<label for="">Current Password</label>
				<input type="text" name="cpass" required><br>
				
				<label for="">New Password</label>
				<input type="text" name="npass" required><br>
				
				<label for="">Retype Password</label>
				<input type="text" name="cfpass" required><br>
			
			<br><br>
				<input type="submit" class="fbtn" value="SUBMIT" name="submit"/>
			<br><br>
			</div>
		</form>
	</div>
	<br><br><br><br><br>
	</body>
	
</html>

<?php
	if(isset($_POST['submit'])){
		$oldpass	 	= 	$_POST['cpass'];
		$newpass 		= 	$_POST['npass'];
		$matched 		= 	$_POST['cfpass'];
		
		$sql=mysqli_query($conn,"SELECT pPassword FROM patient where pPassword='$oldpass' and patient_ID='$id'");
		$num=mysqli_fetch_array($sql);
		
		if($num){
			if ($newpass != $matched){
				echo "<script>alert('Password does not matched');</script>";
			}
			else{
			$con=mysqli_query($conn,"update patient set pPassword='$newpass' where patient_ID ='$id'");
			 echo "<script>alert('Password Changed successful'); window.location = '../index.html';</script>";
			}
		}
		else{
			echo "<script>alert('Old Password does not matched');</script>";
		}
	}
?>