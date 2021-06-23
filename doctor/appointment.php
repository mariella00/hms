<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM doctor where doctor_ID = '$id'");
	$row = mysqli_fetch_array($query);
	
	if(isset($_GET['done'])){
		mysqli_query($conn,"update appointment set ptnStatus='0' where count ='".$_GET['id']."'");
        echo "<script>alert('Appointment Done');</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Doctor | Appointment</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	
	<h3>MY APPOINTMENT</h3>
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
		$sql= mysqli_query($conn, "SELECT patient.pFullName as name,appointment.*  from appointment
			join patient on patient.patient_ID = appointment.patient_ID
			where appointment.doctor_ID='$id'");
			
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
			echo "Done";
		}
	
		if(($row['ptnStatus']==1) && ($row['docStatus']==0))  
		{
			echo "Cancel by Patient";
		}
	?></td>
	
	<td>
	<?php if(($row['ptnStatus']==1) && ($row['docStatus']==1))  
	{ ?>										
	<a href="appointment.php?id=<?php echo $row['count']?>&done=update" onClick="return confirm('Confirm status as appointment done?')"
	class="icn" title="Appointment Done" tooltip-placement="top" tooltip="Remove">Done</a>
	<?php } ?>
	</td></tr>
	
	<?php } ?>
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>