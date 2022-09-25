<?php
include "../connect.php";
if(!$_SESSION["login"]) {
header("Location:../index.php");
}





if(isset($_GET["pid"]))
{

	$sorgu=$db->prepare("DELETE FROM event WHERE eventId=?");
	$sonuc=$sorgu->execute([$_GET['pid']]);
	if($sonuc){
		header("Refresh: 0; url=https://localhost/Pewoi/admindash/event-delete.php");
	}
	else
		header("Refresh: 0; url=https://localhost/Pewoi/admindash/event-create.php");
}
?>
