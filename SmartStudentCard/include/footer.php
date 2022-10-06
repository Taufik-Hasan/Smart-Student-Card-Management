<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>


	<div class="footer">
		<div class="footerHolder">
			<div class="col-2">
				<h3>Help</h3>
				<ul>
					<li><a href="">Terms & Conditions</a></li>
					<li><a href="">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-2">
				<h3>Quick Links</h3>
				<ul>
					
					<li><a href="#">Admin Panel</a></li>
					<li><a href="http://www.duet.ac.bd">DUET Main Website</a></li>
				</ul>
			</div>
			<div class="clearFix"></div>
			<div class="copyright">
				&copy;  Dhaka University of Engineering & Technology, Gazipur
			</div>
		</div>
	</div>