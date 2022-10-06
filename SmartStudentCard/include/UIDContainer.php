<?php 
require ('../dataserver.php');
$user=$_SESSION['SSC_user']->username;
$UIDresult=$DB->swip_by_get_card_id($user);
$UIDmsg='Swipe Student ID Card/Key !!'; 
if(!isset($_GET['read'])){
	echo $UIDresult==''?$UIDmsg:$UIDresult;
	if($UIDresult!='') $DB->insert_UID($UIDresult);
	else $DB->insert_UID(null);
}else echo $UIDresult;
?>