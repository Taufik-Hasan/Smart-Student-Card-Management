<?php	
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
	$msg=null;
  	$card_id=$DB->swip_by_get_card_id($DB->current_user->username);
  	if($card_id==''){
  		$data=null;
  	}else{
  		$data= mysqli_fetch_array ($DB->getStudent_information($card_id));
  		if($data!=null) $s_id=$data['student_id'];
  	}

	if (isset($_POST['update_student'])) {
		$s_name= $_POST['s_name'];
		$s_gender = $_POST['s_gender'];
		$s_email= $_POST['s_email'];
		$s_phone = $_POST['s_phone'];
		$s_dept= $_POST['s_dept'];
		$s_semester = $_POST['s_semester'];
		$s_year= $_POST['s_year'];

		$card_id=$DB->swip_by_get_card_id($DB->current_user->username);

		if($DB->match_card_id_and_student_id($card_id,$s_id)){
			if($DB->update_new_student($s_id,$s_name,$s_gender,$s_email,$s_phone,$s_dept,$s_year,$s_semester)){
				$msg ="Student Details update Successfully";
			}else $msg ="Student Can't update thismomment! Please try again.";
		}else $msg = "This card id  and student id does not match !";
	}

	if (isset($_POST['update_card_id'])){
		$s_id=$_POST['student_id'];
		$card_id=$DB->swip_by_get_card_id($DB->current_user->username);
		if(!$DB->valid_student_id($s_id)){
			if(!$DB->match_card_id_and_student_id($card_id,$s_id)){
				if($DB->valid_card_id($card_id)){
					if($DB->update_card_number($s_id,$card_id)){
						$msg='New Smart Card is assigned for this student Successfully';
						$DB->swip_by_card_id_update('');
						$data=null;
					}else $msg='Somthing Went Wrong';
				}else $msg ='This Card already issued assigned another student';
			}else $msg="The Scanned Card is the old ID card of this Student;";
		}else $msg='Student data is not valid';
	}
?>

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

<!-- MAIN -->
<main class="card_regi">
	<div class="table-data">
		<div class="order">
			<div class="head">
				<p align="center" id="blink" style="color:red;font-size: 20px;">Please swipe to Display Card Identity</p>
			</div>
			<div class="informationPanel">
				<p style="text-align: center; color: green;font-size: 20px;"><?php echo $msg; ?></p><br>
				<div class="container">
				  <form action=" " method="POST">
				  <!--<div class="row">
				    <div class="col-25"> 
				      <label >Smart Card ID</label>
				    </div>
				    <div class="col-75">
				    	 <label><p id="getUID"></p></label>
				     <label><?php echo  $data['card_id'] ?></label>
				    </div>
				  </div> -->
				  <div class="row">
				    <div class="col-25">
				      <label >Student ID</label>
				    </div>
				    <div class="col-75">
				      <label><?php if($data!=null) echo  $data['student_id'] ?></label>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Name</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_name" value="<?php if($data!=null)  echo  $data['name'] ?>" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Gender</label>
				    </div>
				    <div class="col-75">
				      <select name="s_gender">
						  <option value="<?php echo  $data['gender'] ?>"><?php if($data!=null)  echo  $data['gender'] ?></option>
						  <option value="Male">Male</option>
						  <option value="Female">Female</option>
						</select>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Email</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_email" value="<?php if($data!=null)  echo  $data['email'] ?>" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Phone</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_phone" value="<?php if($data!=null)  echo  $data['mobile'] ?>" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Department</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_dept" value="<?php if($data!=null)  echo  $data['department'] ?>" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Year</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_year" value="<?php if($data!=null)  echo  $data['year'] ?>" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Semester</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_semester" value="<?php if($data!=null)  echo  $data['semester'] ?>" required>
				    </div>
				  </div>

				  <br>
				  <div class="row">
				    <input type="submit" name="update_student">
				  </div>
				  </form>
				</div>
	            
			</div>
			
		</div>
		
	</div>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Change Card</h3>
				<p align="center" id="blink" style="color:red;font-size: 20px;">Please swipe to Display Card Identity</p>

				<div class="informationPanel">
				<p style="text-align: center; color: green;font-size: 20px;"><?php echo $msg; ?></p><br>
				<div class="container">
				  <form action=" " method="POST">
				  
				  <div class="row">
				    <div class="col-25">
				      <label >Student ID Number</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="student_id" required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >New Card Number</label>
				    </div>
				    <div class="col-75">
				      <label><p id="getUID"></p></label>
				    </div>
				  </div>

				  <br>
				  <div class="row">
				    <input type="submit" name="update_card_id">
				  </div>
				  </form>
				</div>
	            
			</div>
			</div>
		</div>
	</div>
</main>
<!-- MAIN -->


<script>
	// code for tag blink 
	var blink = document.getElementById('blink');
	setInterval(function() {
		blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
	}, 750); 
</script>