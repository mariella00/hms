<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM nurse where nurse_ID = '$id'");
	$row = mysqli_fetch_array($query);
	
	if(isset($_GET['discharged'])){
		mysqli_query($conn,"update report set rpStatus='0' where count ='".$_GET['id']."'");
        echo "<script>alert('Patient is now discharged');</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nurse | Report</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<a class="add" href="make-report.php">Create Report</a>
	
	<div class="bd-box">
	<h3>MANAGE REPORT</h3>
	<hr>
	
		<table>
		<thead>
			<tr>
			<th>Patient Name</th>
			<th>Doctor Assigned</th>
			<th>Disease</th>
			<th>Height (cm)</th>
			<th>Weight (kg)</th>
			<th>Temperature (deg C)</th>
			<th>Blood Pressure</th>
			<th>Sugar Level</th>
			<th>Symptoms</th>
			<th>Status</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
				
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT patient.pFullName as pname,report.*,
			doctor.dFullName as dname,report.* FROM report
			JOIN patient ON patient.patient_ID = report.patient_ID
			JOIN doctor ON doctor.doctor_ID = report.doctor_ID
			where report.nurse_ID='$id'");
			
		while($row = mysqli_fetch_array($sql)){
	?>

	<tr>
	<td><?php echo $row['pname'];?></td>
	<td><?php echo $row['dname'];?></td>
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
	?></td>
	
	<td>
	<?php if($row['rpStatus']==1)  { ?>										
	<a href="report.php?id=<?php echo $row['count']?>&discharged=update" onClick="return confirm('Discharged this patient?')"
	class="icn" title="Patient Discharged" tooltip-placement="top" tooltip="Remove">Discharged</a>
	<?php } ?>
	</td></tr>
	
	<?php } ?>
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>