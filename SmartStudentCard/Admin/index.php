<?php
	require ("../dataserver.php");
	
	if(!isset($_SESSION['SSC_user'])){
		require('../include/error.php');
		return;
	}
	else{
		if($DB->current_user->user_type!="Admin"){
			require('../include/error.php');
			return;
		}
	}

	
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<title>Smart Card Managment</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myDIV *").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
	</script>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../admin/" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Smart Card</span>
		</a>
		<ul class="side-menu top">
			
			<?php if(!isset($_GET['tab'])){?>
			<li class="active">
			<?php } else {?>
			<li>
			<?php } ?>
				<a href="../admin/">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
					</a>
			</li>
		
		
			<?php if(isset($_GET['tab'])){ if($_GET['tab']=="cardRegistration"){?>
			<li class="active">
			<?php } else {?>
			<li>
			<?php }} else{?>
			<li>
			<?php } ?>
				<a href="?tab=cardRegistration">
					<i class='bx bxs-id-card'></i>
					<span class="text">New Card Registration</span>
				</a>
			</li>

			<?php if(isset($_GET['tab'])){ if($_GET['tab']=="updateCard"){?>
			<li class="active">
			<?php } else {?>
			<li>
			<?php }} else{?>
			<li>
			<?php } ?>
				<a href="?tab=updateCard">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Update Card Information</span>
				</a>
			</li>

			<?php if(isset($_GET['tab'])){ if($_GET['tab']=="userManipulate"){?>
			<li class="active">
			<?php } else {?>
			<li>
			<?php }} else{?>
			<li>
			<?php } ?>
				<a href="?tab=userManipulate">
					<i class='bx bxs-user-check'></i>
					<span class="text">User Manipulate</span>
				</a>
			</li>

			
		</ul>
		<ul class="side-menu">

			<?php if(isset($_GET['tab'])){ if($_GET['tab']=="setting"){?>
			<li class="active">
			<?php } else {?>
			<li>
			<?php }} else{?>
			<li>
			<?php } ?>
				<a href="?tab=setting">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/SmartStudentCard/index.php?logout=true" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<div class="nav_left">
				<a href="../admin" class="nav-link">Smart Student Card Management</a>
			</div>
			<div class="nav_right">
				<form action=" ">
					<div class="form-input">
						<input id="myInput" type="search" placeholder="Search...">
						<button type=" " class="search-btn"><i class='bx bx-search' ></i></button>
					</div>
				</form>
			</div>
			
			
			
		</nav>
		<!-- NAVBAR -->	

		<!-- MAIN -->
		<main class="main_content">
			<?php
			if(!isset($_GET['tab'])){?>
			<div class="tabTitle"><h5>Dashboard</h5></div>
			<div class="tabContent">
				<?php include('home.php');?>
			</div>
			<?php
			}
			else{?>
			<div class="tabTitle">

			<?php
				if($_GET['tab']=="cardRegistration")
					echo "Student Card Registration";
				else if($_GET['tab']=="updateCard")
					echo "Update Student/Card Information";
				else if($_GET['tab']=="userManipulate")
					echo "User Setting";
				else if($_GET['tab']=="setting")
					echo "Setting";
				else
					header("Location:../");
				?>
				</div>
				<div class="tabContent" id="adminTabContent">
					<?php
						if($_GET['tab']=="cardRegistration")
							include('cardRegistration.php');
						else if($_GET['tab']=="updateCard")
							include('updateCard.php');
						else if($_GET['tab']=="userManipulate")
							include('userManipulate.php');
						else if($_GET['tab']=="setting")
							include('setting.php');
						else
							header("Location:../");
					?>
				<div class="clearFix"></div>
				</div>
				<?php } ?><br>
				<p align="center">ALL Right Reserved by &copy; Dhaka University of Engineering Technology, Gazipur.</p>		
			</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="script.js"></script>
</body>
</html>