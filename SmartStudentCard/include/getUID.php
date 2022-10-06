<?php 
	require ('../dataserver.php');
	$UID=NULL;
	if(isset($_POST["UIDresult"])){
		$UID=$_POST["UIDresult"];
		$DB->swip_by_card_id_update($UID);
	}
?>

<!--
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="UIDresult">
		<input type="submit" name="">
	</form>
</body>
</html>
-->