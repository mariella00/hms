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
		<title>Doctor | Patient Report</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	
	<h3>PATIENT REPORT</h3>
	<hr>
		<table>
			<thead>
				<tr>
				<th>Patient Name</th>
				<th>Disease</th>
				<th>Height (cm)</th>
				<th>Weight (kg)</th>
				<th>Temperature (deg C)</th>
				<th>Blood Pressure</th>
				<th>Sugar Level</th>
				<th>Symptoms</th>
				<th>Status</th>
				</tr>
			</thead>
			<tbody>
				
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT patient.pFullName as name,report.*  from report
			join patient on patient.patient_ID = report.patient_ID
			where report.doctor_ID='$id'");
		while($row = mysqli_fetch_array($sql)){
	?>
	
	<tr>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['rpDisease'];?></td>
	<td><?php echo $row['rpHeight'];?></td>
	<td><?php echo $row['rpWeight'];?></td>
	<td><?php echo $row['rpTemp'];?></td>
	<td><?php echo $row['rpBloodPressure'];?></td>
	<td><?php echo $row['rpSugarLevel'];?></td>
	<td><?php echo $row['rpSymptoms'];?></td>
	
	<td>
	<?php if($row['rpStatus']==1)
		{
			echo "Admitted";
		}
		if($row['rpStatus']==0) 
		{
			echo "Discharged";
		}
	?></td></tr>
	<?php } ?>
	
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>