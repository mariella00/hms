<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | View Reports</title>
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
			<p>ADMINISTRATOR&nbsp <small>REPORT HISTORY</small></p>
			<hr>
			
			<table>	
				<thead>
				<tr>
				<th>Patient Name</th>
				<th>Doctor Assigned</th>
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
					$sql= mysqli_query($conn, "SELECT doctor.dFullName as dname,report.*, patient.pFullName as pname,report.*, nurse.nFullName as nname,report.* FROM report JOIN doctor ON doctor.doctor_ID = report.doctor_ID JOIN patient ON patient.patient_ID = report.patient_ID JOIN nurse ON nurse.nurse_ID = report.nurse_ID");
					while($row=mysqli_fetch_array($sql)) {
				?>
	
	<tr>
	<td><?php echo $row['pname'];?></td>
	<td><?php echo $row['dname'];?></td>
	<td><?php echo $row['nname'];?></td>
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