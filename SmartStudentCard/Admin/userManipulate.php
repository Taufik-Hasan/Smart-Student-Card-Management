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

	if (isset($_POST['new_medical_user'])) {
		$userName=$_POST['username'];
		$password=$_POST['password'];
		$name=$_POST['name'];
		$desig=$_POST['desig'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$room_number=$_POST['room_number'];
		if($DB->valid_username($userName)){
			if($DB->create_medical_iser($userName,$password,$name,$desig,$phone,$email,$room_number)){
				$msg='User Added Successfully';
			}else $msg ='Somthing went wrong!';
		}else $msg = 'User name Already taken. Please try to use another username.';

	}
	if (isset($_POST['new_liberian_user'])) {
		$userName=$_POST['username'];
		$password=$_POST['password'];
		$name=$_POST['name'];
		$desig=$_POST['desig'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$room_number=$_POST['room_number'];
		if($DB->valid_username($userName)){
			if($DB->create_liberian_iser($userName,$password,$name,$desig,$phone,$email,$room_number)){
				$msg='User Added Successfully';
			}else $msg ='Somthing went wrong!';
		}else $msg = 'User name Already taken. Please try to use another username.';

	}

?>


<!-- MAIN -->
<main class="card_regi">
	<div class="table-data">
		<div class="order">
				<h3>Add Medical Center User</h3>
			<div class="informationPanel">
				<p style="text-align: center; color: green;font-size: 20px;"><?php echo $msg; ?></p><br>
				<div class="container">
				  <form action=" " method="POST">
				  <div class="row">
				    <div class="col-25">
				      <label >username</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="username" placeholder="username.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Password</label>
				    </div>
				    <div class="col-75">
				      <input type="password"  name="password" placeholder="Password.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Name</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="name" placeholder="Name.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Designation</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="desig" placeholder="Designation.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Phone</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="phone" placeholder="phone.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Email</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="email" placeholder="email.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Room Number</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="room_number" placeholder="room_number.." required>
				    </div>
				  </div>
				  

				  <br>
				  <div class="row">
				    <input type="submit" name="new_medical_user">
				  </div>
				  </form>
				</div>
	            
			</div>
			
		</div>
		
	</div>
	<div class="table-data">
		<div class="order">
				<h3>Add Central Library User</h3>
			<div class="informationPanel">
				<p style="text-align: center; color: green;font-size: 20px;"><?php echo $msg; ?></p><br>
				<div class="container">
				  <form action=" " method="POST">
				  <div class="row">
				    <div class="col-25">
				      <label >username</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="username" placeholder="username.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Password</label>
				    </div>
				    <div class="col-75">
				      <input type="password"  name="password" placeholder="Password.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Name</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="name" placeholder="Name.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Designation</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="desig" placeholder="Designation.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Phone</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="phone" placeholder="phone.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Email</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="email" placeholder="email.." required>
				    </div>
				  </div>
				  <div class="row">
				    <div class="col-25">
				      <label >Room Number</label>
				    </div>
				    <div class="col-75">
				      <input type="text"  name="room_number" placeholder="room_number.." required>
				    </div>
				  </div>
				  

				  <br>
				  <div class="row">
				    <input type="submit" name="new_liberian_user">
				  </div>
				  </form>
				</div>
	            
			</div>
			
		</div>
		
	</div>
</main>
<!-- MAIN -->

