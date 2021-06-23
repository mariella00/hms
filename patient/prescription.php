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
		<title>Patient | Prescription</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<div class="bd-box">
	
	<h3>MY PRESCRIPTION</h3>
	<hr>
		<table>	
			<thead>
				<tr>
				<th>Doctor Name</th>
				<th>Medicine</th>
				<th>Dosage</th>
				<th>Status</th>
				</tr>
			
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT doctor.dFullName as name,prescription.*  from prescription
			join doctor on doctor.doctor_ID = prescription.doctor_ID
			where prescription.patient_ID='$id'");
		
		while($row = mysqli_fetch_array($sql)){
	?>
	
	<tr>
	<td><?php echo $row['name'];?></td>
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