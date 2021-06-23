<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Doctor | Home</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
	<?php include('navigation.php');?>
	
	<div class="td-info">
	<?php
		date_default_timezone_set('Asia/Manila');
		echo "".date("g:i a")."<br>"."<br>" .date("F d, Y") ;
	?>
		
		<div class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			 <strong>REMINDER: </strong>Go to settings to complete the registration of your profile. Disregard this message if already done. Thank you.
		</div>
		
		<div class ="infos">
			<li><div class ="lside"><br>
			<h3 style="text-align: center">COVID19 CASES</h3>
			<a href="https://news.google.com/covid19/map?hl=en-PH&gl=PH&ceid=PH%3Aen" target="_blank">Click here</a>
			</li>
			
			<li><div class ="rside"><br>
			<h3 style="text-align: center">COVID19 UPDATE</h3>
			<a href="https://www.doh.gov.ph/2019-nCov" target="_blank">Click here</a>
			</li>
			
			</div>
			</div>
		</div>
	
	</div>
	</body>
	
</html>