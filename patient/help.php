<?php
	include("../include/config.php");
	
	$val = $_GET["value"];
	$test = mysqli_real_escape_string($conn, $val);
	
	$sql = "SELECT doctor_ID, dFullName FROM doctor WHERE dSpecialization='$test'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result)> 0){
		echo "<select>";
		
		while($rows = mysqli_fetch_array($result)){?>
			<option value="<?php echo($rows['doctor_ID']); ?>"><?php echo($rows['dFullName']); ?></option>
			<?php
		}
		echo "</select>";
	}
	else{
		echo "<select>
		<option>No Doctor from this specialization</option>
		</select>";
	}

?>