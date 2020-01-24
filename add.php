<?php
	include_once('connect.php');

	if(isset($_SESSION['chattable']) && isset($_POST['username']) && isset($_POST['message'])){
		$chattime = substr(date('c'), 0, 10) . " " . substr(date('c'), 11, 8);
		$sqladd = "INSERT INTO `{$_SESSION['chattable']}` VALUES (NULL, '{$_POST['username']}', '{$_POST['message']}', '{$chattime}')";
		$retadd = mysqli_query($conn, $sqladd);
		if(!$retadd){
			echo "<script>alert('쿼리 오류 발생.');</script>";
		}
	}
	include_once('messages.php');

?>
