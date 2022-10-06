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

	$msg=NULL;
	
	if (isset($_POST['clear'])) {
		$user=$_SESSION['SSC_user']->username;
		$s_id= $DB->swip_by_card_id_update('',$user);
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smart Student Card Management</title>
	<link rel="icon" src="../images/icon/duet_icon.ico">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../fonts/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<script>
		//UIDContainer load id 
		$(document).ready(function(){
				$("#getUID").load("../include/UIDContainer.php");
			setInterval(function() {
				//alert("ffffff");
				$("#getUID").load("../include/UIDContainer.php");
			}, 500);
		});
		
	</script>

</head>
<body>
	<!-- Main Section Start -->
	<!-- Header Start -->
	<?php
		require ("liberian_header.php");
	?>
	<br><br><br><br>
	<div class="clearFix"></div>
	<!-- Header End -->
	<div class="docMain">
	<br>
		<div class="LibLeftPanel" id="LibLeftPanel">
			<h4 align="center">Check/Provide Services</h4>
			<p align="center" id="blink" style="color:red;font-size: 20px;">Please swipe to Display ID</p>

			
			<p id="getUID" hidden ></p>
	

			<div id="student_information">
				<div class="left_student_info">
					Student ID : <b>-----</b>
				</div>
				<div class="right_student_info">
					Department : <b>-----</b>
				</div>
				<div class="clearFix"></div>
				<div class="left_student_info">
					Name : <b>-------</b>
				</div>
				<div class="right_student_info">
					Year/Semester : <b>------</b>
				</div>
			</div>
			<p style="color:red;text-align: center;"><?php echo $msg;?></p>
				<form method="POST" action="">
					<div class="clear_btn">
						<button type="submit" name="clear" id="clear_button">Clear</button><br><br>
					</div>
				</form>
		</div>

		<div class="LibRightPanel" id="LibRightPanel">
			<h4>Issued Book Status</h4>
			<table  id="styles"> 
	            <thead>
	                <tr>
	                    <th style="text-align:center;color: black;">Service No</th>
	                    <th style="text-align:center;color: black;">Issue Date</th>
	                    <th style="text-align:center;color: black;">Status</th>
	                    <th style="text-align:center;color: black;" >Descriptions</th>
	                            
	                </tr>
	            </thead>
	            <tbody>
	              
	            </tbody>
	        </table>
            <br><br>
		</div>
		
		<div class="clearFix"></div>
	</div><!-- /.main -->
	<!-- Main Section End -->
	<!-- Footer Section Start -->






	<?php
		require ("../include/footer.php");
	?>
	<!-- Footer Section End -->
	<script src="../js/jquery-2.x-git.min.js"></script>
	<script src="../js/function.js"></script>

	<script>
			var myVar = setInterval(myTimer, 1000);
			var myVar1 = setInterval(myTimer1, 1000);
			var oldID="";
			clearInterval(myVar1);

			function myTimer() {
				var getID=document.getElementById("getUID").innerHTML;
				oldID=getID;
				if(getID!="") {
					myVar1 = setInterval(myTimer1, 500);
					showUser(getID);
					showService(getID);
					clearInterval(myVar);
				}
			}
			
			function myTimer1() {
				var getID=document.getElementById("getUID").innerHTML;
				if(oldID!=getID) {
					myVar = setInterval(myTimer, 500);
					clearInterval(myVar1);
				}
			}
			
			function showUser(str) {
				if (str == "") {
					document.getElementById("student_information").innerHTML = "";
					return;
				}else{
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					}else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("student_information").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","../include/getStudentInfo.php?id="+str,true);

					xmlhttp.send();
				}
			}
			function showService(str) {
				if (str == "") {
					document.getElementById("styles").innerHTML = "";
					return;
				}else{
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					}else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("styles").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","getBookServiceTable.php?id="+str,true);

					xmlhttp.send();
				}
			}

		// code for popup
		let popup =document.getElementById("popup");
		function openpopup(){
			popup.classList.add("open-popup");
		}
		function closepopup(){
			popup.classList.remove("open-popup");
		}

		// code for tag blink 
		var blink = document.getElementById('blink');
		setInterval(function() {
			blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
		}, 750); 
	</script>

</body>
</html>