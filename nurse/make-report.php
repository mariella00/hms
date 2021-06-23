<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM nurse where nurse_ID = '$id'");
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nurse | Create Report</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	<form action="make-report.php" method="post">
	
	<h3>CREATE REPORT</h3>
	<hr>
	
		<div class="dfrm">
		<label>Patient Name</label>
				<select name="patient" required>
				<option>Select Patient</option>
					<?php
						$sql= "SELECT * FROM patient";
						$result = mysqli_query($conn, $sql);
							
						while ($row = mysqli_fetch_array($result)){
								$pID = $row['patient_ID'];
								echo '<option>'.$row['pFullName'].'</option>';
						}
					?>
				</select><br>
		
		<label>For Doctor (check appointment)</label>
				<select name="doctor" required>
				<option>Select Doctor</option>
					<?php
						$sql= "SELECT * FROM doctor";
						$result = mysqli_query($conn, $sql);
							
						while ($row = mysqli_fetch_array($result)){
								$dID = $row['doctor_ID'];
								echo '<option>'.$row['dFullName'].'</option>';
						}
					?>
				</select><br>
		
		<label>Disease</label>
		<textarea name="disease" required></textarea><br>
				
		<label>Height (cm)</label>
		<input type="number" name="height" required><br>

		<label>Weight (kg)</label>
		<input type="number" name="weight" required><br>
		
		<label>Temperature (deg C)</label>
		<input type="number" name="temp" required><br>
		
		<label>Blood Pressure</label>
		<input type="text" name="bloodpres" required><br>
		
		<label>Sugar Level</label>
		<input type="number" name="sugarlev" required><br>
		
		<label>Symptoms</label>
		<textarea name="symptoms" required></textarea><br>
				
		<br><br>
		<input type="submit" class="fbtn" value="CREATE" name="makebtn"/>
		<br><br><br>
		
		</div>
	</div>
	<br><br><br><br><br>
	
	</form>
	</body>
	
</html>
	
	<?php
	include("../include/config.php");

		if(isset($_POST['makebtn'])){
		$disease 	= 	$_POST['disease'];
		$height 	= 	$_POST['height'];
		$weight	 	= 	$_POST['weight'];
		$temp	 	= 	$_POST['temp'];
		$bp	 		= 	$_POST['bloodpres'];
		$sl	 		= 	$_POST['sugarlev'];
		$symptoms 	= 	$_POST['symptoms'];
		$stat = 1;
			
			
		mysqli_query($conn, "INSERT into report (doctor_ID, patient_ID, nurse_ID,
		rpDisease, rpHeight, rpWeight, rpTemp, rpBloodPressure, rpSugarLevel,
		rpSymptoms, rpStatus) VALUES ('$dID', '$pID', '$id', '$disease', '$height', '$weight',
		'$temp', '$bp', '$sl', '$symptoms', '$stat')");
		
			?>
	
		<script type="text/javascript">
		alert("Prescription created, you can view it in the Manage Report Tab.");
		window.location = "make-report.php";
		</script>
	<?php } ?>