<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM doctor where doctor_ID = '$id'");
	$row = mysqli_fetch_array($query);
	
	if(isset($_GET['recovered'])){
		mysqli_query($conn,"update prescription set prStatus='0' where count ='".$_GET['id']."'");
        echo "<script>alert('Medication finished');</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Doctor | Prescription</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	<a class="add" href="make-prescript.php">Create Prescription</a>
	
	<div class="bd-box">
	<h3>MANAGE PRESCRIPTION</h3>
	<hr>
		<table>
			<thead>
				<tr>
				<th>Patient Name</th>
				<th>Medicine</th>
				<th>Dosage</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			
	<?php include('../include/config.php');
		$sql= mysqli_query($conn, "SELECT patient.pFullName as name,prescription.*  from prescription
			join patient on patient.patient_ID = prescription.patient_ID
			where prescription.doctor_ID='$id'");
			
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
	?></td>
	
	<td>
	<?php if($row['prStatus']==1)  { ?>										
	<a href="prescription.php?id=<?php echo $row['count']?>&recovered=update" onClick="return confirm('Is the medication done?')"
	class="icn" title="Patient Recovered" tooltip-placement="top" tooltip="Remove">Recovered</a>
	<?php } ?>
	</td></tr>
	
	<?php } ?>
		</tbody>
	</table>
		
	</div>
	<br><br><br><br><br>
	</body>
	
</html>