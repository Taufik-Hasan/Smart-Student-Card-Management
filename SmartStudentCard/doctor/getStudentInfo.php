<?php
    require '../dataserver.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $data =null;
    $msg = null;
    if($id!=null){
		$query=$DB->getStudent_information($id);
		if(mysqli_num_rows($query)==1){
			$data = mysqli_fetch_array($query);
			//$msg= "Hello World";
		}else if(mysqli_num_rows($query)==0){
			$user=$_SESSION['SSC_user']->username;
			$id=$DB->swip_by_get_card_id($user);
			if($id!='') $msg = "The ID of your Card / KeyChain is not registered !!!";
			$data['student_id']='--------';
			$data['department']="--------";
			$data['year']="----";
			$data['semester']="----";
			$data['name']="--------";
		}else{
			echo "Somthing went wrong!";
			return;
		}

    }
    if (!$data) {
		$data['student_id']='--------';
		$data['department']="--------";
		$data['year']="--------";
		$data['semester']="--------";
		$data['name']="--------";
	} 

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet"  href="../css/style.css" >
	
</head>
 
	<body>
		<div >
			<div class="left_student_info">
				Student ID: <b><?php echo $data['student_id']; ?></b>
			</div>
			<div class="right_student_info">
				Department: <b><?php echo $data['department']; ?></b>
			</div>
			<div class="clearFix"></div>
			<div class="left_student_info">
				Name: <b><?php echo $data['name']; ?></b>
			</div>
			<div class="right_student_info">
				Year/Sem.: <b><?php echo $data['year']."/".$data['semester']; ?></b>
			</div>
		</div>
		<br>
		<p style="color:red;text-align: center;"><?php echo $msg;?></p>
	</body>
</html>