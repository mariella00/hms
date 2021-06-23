<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | Home</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
		<div class="wrapper" id="wrapper">
			<div class="top_navbar">
				<div class="menu">
					<div class="logo">COVID19 Hospital Management System</div>
					<li><a href="../include/logout.php" onClick="return confirm('Are you sure you want to logout?')">Logout</a></li>
				</div>
			</div>
			<p>ADMINISTRATOR&nbsp <small>DASHBOARD</small></p>
			<hr>
			<ul class="users">
			<br><br>
				<li><img src="../img/doc.png">
				<br><h3>DOCTOR</h3>
				<a href="manage-doc.php">MANAGE</a></li>
				
				<li><img src="../img/ptn.png">
				<br><h3>PATIENT</h3>
				<a href="manage-ptn.php">MANAGE</a></li>
				
				<li><img src="../img/nurse.png">
				<br><h3>NURSE</h3>
				<a href="manage-nrs.php">MANAGE</a></li>	
		</ul>
		<br>
		<ul class="service">
			<br><br>
				<li><img src="../img/appoint.png">
				<br><h3>APPOINTMENTS</h3>
				<a href="view-appoints.php">VIEW</a></li>
				
				<li><img src="../img/ptn.png">
				<br><h3>PRESCRIPTIONS</h3>
				<a href="view-prescript.php">VIEW</a></li>
				
				<li><img src="../img/report.png">
				<br><h3>REPORT</h3>
				<a href="view-report.php">VIEW</a></li>	
		</ul>
			
		</div>
	</body>
	
</html>