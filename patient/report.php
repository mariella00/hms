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
		<title>Patient | Report</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	
	<h3>HEALTH REPORT</h3>
	<hr>
		<table>
			<thead>
				<tr>
				<th>Evaluated by</th>
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
		$sql= mysqli_query($conn, "SELECT nurse.nFullName as name,report.*  from report
			join nurse on nurse.nurse_ID = report.nurse_ID
			where report.patient_ID='$id'");
			
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