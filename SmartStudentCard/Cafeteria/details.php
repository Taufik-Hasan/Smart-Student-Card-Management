<?php
	require ("../dataserver.php");
	if(!isset($_SESSION['SSC_user'])){
		require('../include/error.php');
		return;
	}
	else{
		if($DB->current_user->user_type!="Liberian"){
			require('../include/error.php');
			return;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smart Student Card Management</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<link rel="icon" src="../images/icon/duet_icon.ico">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome.min.css">
	
</head>
<body>
	<!-- Main Section Start -->
	<!-- Header Start -->
	<?php
		require ("liberian_header.php");
	?>
	<br><br><br>
	<!-- Header End -->
	<div class="main">
		<br><br>
		<center><h3>Service Details</h3></center>
		<div class="singlebox">
			<?php
			if(isset($_GET['details_id'])){
				$details_id = ($_GET['details_id']);
				if($DB->match_details_id_and_student_id($details_id, $DB->get_Student_ID($DB->swip_by_get_card_id($DB->current_user->username)))){
					$details_data=$DB->get_details_data($details_id);
				?>
			<table class="reportView">
				
				<tr class="oddRow">
					<th>Book Name</th>
					<td><?php echo $details_data['name'];?></td>
				</tr>
				<tr class="evenRow">
					<th>Accession Number</th>
					<td><?php echo $details_data['accession_id'];?></td>
				</tr>
				<tr class="oddRow">
					<th>Issue Date</th>
					<td><?php echo $details_data['service_date'];?></td>
				</tr>
				<tr class="evenRow">
					<th>Issued By</th>
					<td><?php echo $DB->get_liberian_name_by_username($details_data['issuer'])." ( ".$details_data['issuer']." )";?></td>
				</tr>
				<tr class="oddRow">
					<th>Returned Date</th>
					<td><?php echo $details_data['return_date'];?></td>
				</tr>
				<tr class="evenRow">
					<th>Day Consume</th>
					<td><?php $day= $DB->dayFind($details_id); echo $day['day'];?></td>
				</tr>
				<tr class="oddRow">
					<th>Status</th>
					<td><?php if($details_data['status']){echo "Due";}else echo "Returned"; ?></td>
				</tr>
				<tr class="evenRow">
					<th>Fine </th>
					<td>
						<?php $day= $DB->dayFind($details_id);
						if($day['day']>30) echo $day['day']*0.50;
						else if($day['day']>15) echo $day['day']*0.25;
						else echo "0";
						?>
					</td>
				</tr>
				
			</table>
			<?php 
			
			}
				else
					echo "<br><br><center><p class=\"unsuccessMessage\">Invalid Access request</p></center><br><br>";
			}
			else
				header("Location: ../Liberian/");
			?>
		</div>
		<br>
		<center>
			<a href="../Liberian/"><button class="button2">
				<i class="fa fa-arrow-circle-left"></i> Go Back
			</button></a>
		</center>	
		<br>
	</div><!-- /.main -->
	<!-- Main Section End -->
	<!-- Footer Section Start -->
	<?php
		require ("../include/footer.php");
	?>
	<!-- Footer Section End -->
	<script src="../js/jquery-2.x-git.min.js"></script>
	<script src="../js/function.js"></script>

</body>
</html>

