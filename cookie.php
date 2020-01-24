<h2>쿠키 방문자 카운터 </h2>
<?php

	$count = 1;
	$refreshTime = 30;
	if(isset($_COOKIE['count'])){
		$count = $_COOKIE['count'];
		$count++;
	}
	setcookie("count", $count, time() + $refreshTime);


	echo "<p> {$count}번째 방문입니다.</p><p>{$refreshTime}초 내에 새로고침하면 카운트가 올라갑니다.</p>";
?>
