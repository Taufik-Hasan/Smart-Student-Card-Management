<?php
	require ("../dataserver.php");
	if(!isset($_SESSION['SSC_user'])){
		require('../include/error.php');
		return;
	}
	else{
		if($DB->current_user->user_type!="Doctor"){

			require('../include/error.php');
			return;
		}
	}
	if (!isset($_GET['details_id'])) {
		require('../include/error.php');
		return;
	}else{
		$details_id=$_GET['details_id'];
		$s_id= $DB->get_Student_ID($DB->swip_by_get_card_id($_SESSION['SSC_user']->username));
		if($DB->match_medical_details_id_and_student_id($details_id,$s_id)){
			$data=$DB->get_medical_details_data($details_id);
		}else{
			require('../include/error.php');
			return;
		}
	}

	$msg=NULL;
	if (isset($_POST['service_provide'])) {
		$user=$_SESSION['SSC_user']->username;
		$s_id= $DB->get_Student_ID($DB->swip_by_get_card_id($user));
		if($s_id!=''){
			$s_descrip= $_POST['descriptions'];
			if($DB->medical_service_provide($s_id,$s_descrip)){
				$msg="Service Added Succesfully";
			}else $msg="Somthing went wrong, Please try again!";
		}else $msg="Please Swipe card first!";
	}
	if (isset($_POST['clear'])) {
		$user=$_SESSION['SSC_user']->username;
		$s_id= $DB->swip_by_card_id_update('',$user);
		header('Location: ../doctor');
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
		
		// table reload
		$(document).ready(function(){
			$("#service_button").click(function(){
				$("#styles").load("../doctor/realtime_table.php");
			});
		});
		// details reload
		$(document).ready(function(){
			$("#details_button").click(function(){
				$("#styles").load("../doctor/details.php");
			});
		});
	</script>

</head>
<body>
	<!-- Main Section Start -->
	<!-- Header Start -->
	<?php
		require ("../include/header.php");
	?>
	<br><br><br>
	<?php
		require ("../doctor/doc_header.php");
	?><br><br>
	<!-- Header End -->
	<div class="docMain">
		<div class="docLeftPanel">
			<h4 align="center">Check/Provide Services</h4>
			<p align="center" id="blink" style="color:red;font-size: 20px;">Please swipe to Display ID</p>
			<p id="getUID" hidden></p>

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
			<div class="left_btn">
				<a href="../doctor"><button id="service_button">Back</button></a>
			</div>
			<form action="" method="POST">  
				<div class="right_btn" >
					<button type="submit" name="clear" id="clear_button">Clear</button><br><br>
				</div>
			</form>
		</div>

		<div class="docMiddlePanel">
			<h4>Details </h4>
			<table  id="styles"> 
                <thead>
                    <tr>  
                        <th width="20%" style="text-align:center;color: black;">Service Date</th>
                        <th style="text-align:center;color: black;" >Descriptions</th>         
                    </tr>
                </thead>
            	<tbody>
              		<tr>  
                        <td style="text-align:center;color: black;"><?php echo $data['service_date']; ?></td>
                        <td style="text-align:center;color: black;" ><?php echo $data['service_descp']; ?></td>         
                    </tr>

                </tbody>
            </table>
		</div>

		
		
		<div class="clearFix"></div>
	</div><!-- /.main -->
	<!-- Main Section End -->

	<!-- Footer Section Start -->
	<?php
		require ("../include/footer.php");
	?>
	<!-- Footer Section End -->

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
			

		// code for tag blink 
		var blink = document.getElementById('blink');
		setInterval(function() {
			blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
		}, 750); 
	</script>

</body>
</html>