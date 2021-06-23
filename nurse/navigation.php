<?php
	include("../include/config.php");
	session_start();
	$id = $_SESSION['id'];
	$query = mysqli_query($conn, "SELECT * FROM nurse where nurse_ID = '$id'");
	$row = mysqli_fetch_array($query);
?>


<div class="wrapper" id="wrapper">
  <div class="top_navbar">
    <div class="menu">
      <div class="logo">
       COVID19 Hospital Management System
      </div>
	  
	  <div class="dropdown">
		<button onclick="myFunction()" class="dbtn">Settings</span></button>
		<div id="myDropdown" class="dropdown_content">
			<a href="edit-profile.php">Edit Profile</a>
			<a href="cpass.php">Change Password</a>
			<a href="../include/logout.php" onClick="return confirm('Are you sure you want to logout?')">Logout</a>
	  </div>
    </div>
  </div> 
  
  <div class="main_container">
      <div class="sidebar">
          <div class="sidebar__inner">
		  
			<div class="profile_info">
					<div class="img_holder">
						<?php echo "<img src='../img/profile/".$row['nProfilepic']."' >"; ?>
					</div>
					<br>
					<p class="title"><?php echo $row['nFullName']; ?></p>
					<p class="sub_title">NURSE</p>
				</div>
            <ul class="lists">
              <li>
                <a href="home.php">
                  <span class="title">Dashboard</span>
                </a>
              </li>
              <li>
				<a href="appointment.php">
                  <span class="title">View Appointment</span>
                </a>
              </li>
              <li>
                <a href="report.php">
                  <span class="title">Manage Report</span>
                </a>
              </li>
              <li>
                <a href="prescription.php">
                  <span class="title">Prescription Info</span>
                </a>
              </li>
            </ul>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
		function myFunction(){
			document.getElementById('myDropdown').classList.toggle("show");
		}
		
		window.onclick = function(event){
			if (!event.target.matches('.dbtn')){
				var dropdowns = document.getElementsByClassName("dropdown_content");
					var i;
					for (i = 0; i < dropdowns.length; i++){
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('show')){
							openDropdown.classList.remove('show');
						}
					}
			}
		};

		const currentLocation = location.href;
		const menuItem = document.querySelectorAll('a');
		const menuLength = menuItem.length
			for (i = 0; i < menuLength; i++){
				if(menuItem[i].href === currentLocation){
					menuItem[i].className = "active"
				}
			}
 
</script>