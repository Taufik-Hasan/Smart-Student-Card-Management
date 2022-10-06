<?php
	if(!isset($_SESSION)){
		require('../include/error.php');
		return;
	}
?>

	<div class="header">
		<div class="mainmenu">
			<center><div class="siteTitle"><a href="../"><img src="../images/icon/duet_icon.ico" height="25">Smart Student ID Card</a></div></center>
			<div class="menubutton" id="menubutton">
				<div class="innerline">
			
				</div>
			</div>
			<div class="clearFix"></div>
			<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a id="menuItemIssueBook">Issue Book</a>
				<ul id="submenuItemIssueBook" class="submenu">
					<div class="subMenuTopBox">......</div>
					<li><a href="apply_for_new_book.php">New Book </a></li>
					<li><a href="returned_book.php">Returned Book</a></li>
				</ul>
			</li>
			<!-- <li><a id="menuItemReports" href="reports.php">Report</a></li> -->
			<li><a href="/SmartStudentCard/index.php?logout=true">Sign Out</a></li>
			</ul>
		</div>
	</div><!-- /.header -->