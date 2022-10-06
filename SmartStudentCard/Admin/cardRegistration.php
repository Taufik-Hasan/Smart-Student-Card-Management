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
	if (isset($_POST['new_student'])) {
		$s_id = $_POST['s_id'];
		$s_name= $_POST['s_name'];
		$s_gender = $_POST['s_gender'];
		$s_email= $_POST['s_email'];
		$s_phone = $_POST['s_phone'];
		$s_dept= $_POST['s_dept'];
		$s_semester = $_POST['s_semester'];
		$s_year= $_POST['s_year'];

		$card_id=$DB->swip_by_get_card_id($DB->current_user->username);

		if($DB->valid_card_id($card_id)){
			if($DB->valid_student_id($s_id)){
				if($DB->insert_new_student($card_id,$s_id,$s_name,$s_gender,$s_email,$s_phone,$s_dept,$s_year,$s_semester)){
					$msg ="Student Assigned this Smart Card Successfully";
				}else $msg ="Student Can't Assigned this Smart Card! Please try again.";
			}else $msg ="This Student already assigned in another Card. If you need, Update card Id! ";
			
		}else $msg = "This Card  already assigned";
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
				  <div class="row">
				    <div class="col-25">
				      <label >Smart Card ID</label>
				    </div>
				    <div class="col-75">
				      <p id="getUID" ></p>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Student ID</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_id" placeholder="Student Identity Number.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Name</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_name" placeholder="Student Name.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Gender</label>
				    </div>
				    <div class="col-75">
				      <select name="s_gender">
						  <option value="volvo">Male</option>
						  <option value="saab">Female</option>
						</select>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Email</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_email" placeholder="Student Email.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Phone</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_phone" placeholder="Phone.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Department</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_dept" placeholder="Department Name.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Year</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_year" placeholder="Running Year.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Semester</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="s_semester" placeholder="Running Semester.." required>
				    </div>
				  </div>

				  <br>
				  <div class="row">
				    <input type="submit" name="new_student">
				  </div>
				  </form>
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