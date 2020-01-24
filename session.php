<h2>세션 방문자 카운터 </h2>
<?php

	include_once("connect.php");

	session_start();
	$count = 1;
	if(isset($_SESSION['count'])){
		$count = $_SESSION['count'];
		$count++;
	}
	$_SESSION['count'] = $count;
	
	echo "<p>{$count}번째 방문입니다. 페이지를 새로고침하세요.</p>";
?>

