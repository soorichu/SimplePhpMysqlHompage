<html>
<head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
?>
	<title>로그아웃</title>
</head>
<body>
<?php

	include_once("menu.php");

	unset($_SESSION['login']);

	echo "<h2>로그아웃 되었습니다.</h2>";

?>
<p><a href="index.php"><span id="remind"></span> 메인으로 이동...</a></p>

<script>
	var remindSec = 3;
	function countdown(){
		if(remindSec>0){
			document.getElementById("remind").innerHTML = remindSec+"초 후";
			remindSec--;
		}else{
			window.location.href ="index.php";
		}
	}
	function init(){
		countdown();
		setInterval(countdown, 1000);
	}

	init();
</script>
</body>
</html>