<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | View Appointments</title>
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
			<p>ADMINISTRATOR&nbsp <small>APPOINTMENT HISTORY</small></p>
			<hr>
			
			<table>	
				<thead>
				<tr>
				<th>Doctor Assigned</th>
				<th>Patient Name</th>
				<th>Scheduled Date</th>
				<th>Scheduled Time</th>
				<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php include('../include/config.php');
					$sql= mysqli_query($conn, "SELECT doctor.dFullName as dname,appointment.*, patient.pFullName as pname,appointment.* FROM appointment JOIN doctor ON doctor.doctor_ID = appointment.doctor_ID JOIN patient ON patient.patient_ID = appointment.patient_ID");
					while($row=mysqli_fetch_array($sql)) {
				?>
				
				<tr>
				<td><?php echo $row['dname'];?></td>
				<td><?php echo $row['pname'];?></td>
				<td><?php echo $row['schedDate'];?></td>
				<td><?php echo $row['schedTime'];?></td>
		
				<td>
	<?php if(($row['ptnStatus']==1) && ($row['docStatus']==1))  
		{
			echo "Active";
		}
		if(($row['ptnStatus']==0) && ($row['docStatus']==1))  
		{
			echo "Finished";
		}
	
		if(($row['ptnStatus']==1) && ($row['docStatus']==0))  
		{
			echo "Canceled";
		}
	?>
	</td></tr>
		
		<?php } ?>
		</tbody>
		</table>
	
		</div>
	</body>
	
</html>