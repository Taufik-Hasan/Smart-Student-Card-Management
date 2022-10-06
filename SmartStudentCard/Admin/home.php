<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>

<!-- MAIN -->
<main class="main_section">
	<ul class="box-info">
		<li>
			<i class='bx bxs-id-card'></i>
			<span class="text">
				<h3><?php echo $DB->total_student(); ?></h3>
				<p>Students</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-first-aid'></i>
			<span class="text">
				<h3><?php echo $DB->today_total_medical_service(); ?></h3>
				<p>Today total Service (Medical)</p>
			</span>
		</li>
		
		<li>
			<i class='bx bx-user-check'></i>
			<span class="text">
				<h3><?php echo $DB->authorized_user(); ?></h3>
				<p>Authorized User</p>
			</span>
		</li>
		<li>
			<i class='bx bx-user-check'></i>
			<span class="text">
				<h3><?php echo $DB->total_medical_user(); ?></h3>
				<p>Medical Center</p>
			</span>
		</li>
		<li>
			<i class='bx bx-user-check'></i>
			<span class="text">
				<h3><?php echo $DB->total_liberian_user(); ?></h3>
				<p>Central Library</p>
			</span>
		</li>
		<li>
			<i class='bx bx-user-check'></i>
			<span class="text">
				<h3><?php echo $DB->total_cafeteria_user(); ?></h3>
				<p>Cafeteria</p>
			</span>
		</li>
	</ul>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>DUET</h3>
				<p>Located in a serene and green campus, Dhaka University of Engineering & Technology (DUET), Gazipur is only about twenty kilometers away from Shahjalal International Airport. DUET is unique in its scope and mission to foster engineering education in Bangladesh as it offers B.Sc. Engineering/B. Arch. degree only to the eligible diploma engineers from around the country.</p>
			</div>
		</div>
	</div>
</main>
<!-- MAIN -->