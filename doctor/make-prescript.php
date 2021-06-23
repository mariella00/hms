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
		<title>Doctor | Create Prescription</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	
	<form action="make-prescript.php" method="post">
	<h3>CREATE PRESCRIPTION</h3>
	<hr>

		<div class="dfrm">
		<label>Patient Name (check appointment)</label>
				<select name="patient" required>
				<option value="">Select Patient</option>
					<?php
						$sql= "SELECT * FROM patient";
						$result = mysqli_query($conn, $sql);
							
							while ($row = mysqli_fetch_array($result)){
								$pID = $row['patient_ID'];
								echo '<option>'.$row['pFullName'].'</option>';
							}
					?>
				</select><br>
			
		<label>Medicine</label>
		<textarea name="medicine" required></textarea><br>
				
		<label>Dosage</label>
		<textarea name="dosage" required></textarea><br>
				
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
							
		$meds	 	= 	$_POST['medicine'];
		$dosage 	= 	$_POST['dosage'];
		$stat = 1;
						
		mysqli_query($conn, "INSERT into prescription(patient_ID, doctor_ID, prMeds, prDosage, prStatus)
		VALUES ('$pID', '$id', '$meds', '$dosage', '$stat')");
	?>
	
		<script type="text/javascript">
		alert("Prescription created, you can view it in the Manage Prescription Tab.");
		window.location = "make-prescript.php";
		</script>
	<?php } ?>