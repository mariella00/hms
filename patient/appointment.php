<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM patient where patient_ID = '$id'");
	$row = mysqli_fetch_array($query);
	
	if(isset($_GET['cancel'])){
		mysqli_query($conn,"update appointment set docStatus='0' where count ='".$_GET['id']."'");
        echo "<script>alert('Appointment cancelled');</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Patient | Appointment</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<a class="add" href="make-appoint.php">Create Appointment</a>
	
	<div class="bd-box">
	<h3>VIEW APPOINTMENT</h3>
	<hr>
	<table>	
		<thead>
			<tr>
			<th>Doctor Assigned</th>
			<th>Scheduled Date</th>
			<th>Scheduled Time</th>
			<th>Status</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT doctor.dFullName as name,appointment.*  from appointment
			join doctor on doctor.doctor_ID = appointment.doctor_ID
			where appointment.patient_ID='$id'");
		
		while($row = mysqli_fetch_array($sql)){
	?>
	
	<tr>
	<td><?php echo $row['name'];?></td>
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
			echo "Cancel by you";
		}
	?></td>
	
	<td>
	<?php if(($row['ptnStatus']==1) && ($row['docStatus']==1))  
	{ ?>										
	<a href="appointment.php?id=<?php echo $row['count']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"
	class="icn" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
	<?php } ?>
	</td></tr>
	
	<?php } ?>
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>