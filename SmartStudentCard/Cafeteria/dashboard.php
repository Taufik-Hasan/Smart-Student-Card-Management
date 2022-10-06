<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>

<div class="singlebox">
	<center>
		<p>Welcome <b><?php  echo $DB->current_user->name;?></b></p>
		<p>
		<?php
			echo $DB->current_user->designation."<br>";
			echo $DB->current_user->email."<br>Central Liberay - ";
			echo $DB->current_user->room_number."<br>";
		?></p>
	</center>
</div>