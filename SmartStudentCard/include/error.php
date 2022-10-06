<?php
$list_of_files_arr = get_included_files();
$string_to_look_for = 'dataserver.php';
$file_not_included=true;
foreach ($list_of_files_arr as $file_path) {
  if (false !== strpos($file_path, $string_to_look_for)) {
    $file_not_included=false;
  } 
}
if($file_not_included)
	include('../dataserver.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smart Student Card Management</title>
	<link rel="icon" href="">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<!-- Main Section Start -->
	<!-- Header Start -->
	<br><br><br>
	<!-- Header End -->
	<div class="main">
		<br><br><br><br><br><br>
		<div class="singlebox" style="border: 0px solid #ffffff;">
		
		<div class="col-2" style="float:none;display: block;">
			<div class="box">
				<div class="boxTitle" style="text-align:center;">
					<h3>Error!</h3>
				</div>
				<div class="boxContent" style="text-align:center;">
					<br>
					<b>Unauthorized access request.</b>
				</div>
			</div>
		</div>
		
		<div class="clearFix"></div>
		</div>
		<br><br><br>
		<!-- Mission and Vision Section End -->

		
		

	</div><!-- /.main -->
	<!-- Main Section End -->
	<!-- Footer Section Start -->

	<!-- Footer Section End -->

</body>
</html>