<?php

$servername = "localhost"; 
$database 	= "hms-db"; 
$dbname 	= "root"; 
$dbpass 	= ""; 

$conn = mysqli_connect($servername, $dbname,
$dbpass, $database);

if ($conn === false){
	die ("CONNECTION ERROR".mysqli_connect_error());
}

?>