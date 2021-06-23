<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM patient where patient_ID = '$id'");
	$row = mysqli_fetch_array($query);

		if(isset($_POST['makebtn'])){
		
		$dID			=	$_POST['doctor'];
		$date	 		= 	$_POST['s-date'];
		$time 			= 	$_POST['s-time'];
		$specialize		=	$_POST['specialize'];
		$ptnStatus = 1;
		$docStatus = 1;
		
		
						
		mysqli_query($conn, "INSERT into appointment (patient_ID, doctor_ID, schedDate, schedTime, ptnStatus, docStatus)
		VALUES ('$id', '$dID', '$date', '$time', '$ptnStatus', '$docStatus')");
		
		?>
	
		<script type="text/javascript">
		alert("Appointment created, you can view it in the Manage Appointment Tab.");
		window.location = "make-appoint.php";
		</script>
		
<?php } ?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patient | Create Appointment</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<script>
		function getdoctor(str){
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange = function(){
				if (this.readyState==4 && this.status==200){
					document.getElementById('doctor').innerHTML =this.responseText;
				}
			}
			xmlhttp.open("GET","help.php?value="+str, true);
			xmlhttp.send();
		}
	</script>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	<form action="make-appoint.php" method="post">
	
	<h3>CREATE APPOINTMENT</h3>
	<hr>
		<div class="dfrm">
		
	<label>Doctor Specialization</label>
		<select name="specialize" id="specialize" onChange="getdoctor(this.value);" required>
		<option>Select Specialization</option>
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
		
		<label>Doctor</label>
				<select name="doctor" id="doctor" required>
				<option>Select Doctor</option>	
				</select><br>
				
		<label>Date</label>
		<input type="date" name="s-date" required><br>
				
		<label>Time</label>
		<input type="time" name="s-time" required><br>
				
		<br><br>
		<input type="submit" class="fbtn" value="CREATE" name="makebtn"/>
		<br><br><br>
		
		</div>
	</div>
	<br><br><br><br><br>
	</form>
	</body>
	
</html>