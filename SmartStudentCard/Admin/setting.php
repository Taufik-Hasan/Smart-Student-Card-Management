<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>

<!-- MAIN -->
<main class="main_section">
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h4>Update Password ( Medical Center User )</h4><br>
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
				      <label >New Password</label>
				    </div>
				    <div class="col-75">
				      <input type="password"  name="password" placeholder="Password.." required>
				    </div>
				  </div>

				  <br>
				  <div class="row">
				    <input type="submit" name="update_medical_user">
				  </div>
				  </form>
				</div>
			</div>
		</div>
		
	</div>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h4>Update Password ( Central Library User )</h4><br>
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
				      <label >New Password</label>
				    </div>
				    <div class="col-75">
				      <input type="password"  name="password" placeholder="Password.." required>
				    </div>
				  </div>

				  <br>
				  <div class="row">
				    <input type="submit" name="update_medical_user">
				  </div>
				  </form>
				</div>
			</div>
		</div>
		
	</div>
</main>
<!-- MAIN -->