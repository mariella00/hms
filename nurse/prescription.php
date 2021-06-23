<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nurse | Prescription</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<br><br>
	<div class="bd-box">
	
	<h3>PRESCRIPTIONS</h3>
	<hr>
		<table>
			<thead>
				<tr>
				<th>Patient Name</th>
				<th>Doctor Assigned</th>
				<th>Medicine</th>
				<th>Dosage</th>
				<th>Status</th>
				</tr>
			
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT patient.pFullName as pname,prescription.*,
			doctor.dFullName as dname,prescription.* FROM prescription
			JOIN patient ON patient.patient_ID = prescription.patient_ID
			JOIN doctor ON doctor.doctor_ID = prescription.doctor_ID");
		
		while($row = mysqli_fetch_array($sql)){
	?>
	
	<tr>
	<td><?php echo $row['pname'];?></td>
	<td><?php echo $row['dname'];?></td>
	<td><?php echo $row['prMeds'];?></td>
	<td><?php echo $row['prDosage'];?></td>
	
	<td>
	<?php if($row['prStatus']==1)
		{
			echo "Ongoing";
		}
		if($row['prStatus']==0) 
		{
			echo "Recovered";
		}
	?>
	</td></tr>
	
	<?php } ?>
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>