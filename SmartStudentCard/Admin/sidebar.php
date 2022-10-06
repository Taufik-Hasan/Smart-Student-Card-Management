<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>

<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../admin/" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Smart Card</span>
		</a>
		<ul class="side-menu top">
			<li> <!-- <li class="active"> -->
				<a href="../admin/">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../admin/cardRegistration.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">New Card Registration</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Update Card Information</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">User Manipulate</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">All Active Card</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
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
			<a href="#" class="nav-link">Smart Student Card Management</a>
			<form action=" ">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type=" " class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			
		</nav>
		<!-- NAVBAR -->
	</section>
	<!-- CONTENT -->