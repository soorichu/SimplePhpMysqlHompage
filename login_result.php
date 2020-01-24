<!Doctype HTML>
<html>
<head>
	<?php
	include_once("head.php");
?>
    <meta charset="utf-8"><title>로그인 결과</title>
</head>
<body>
   <?php

	include_once("menu.php");

	$sql = "select * from g5_member where mb_id='{$_POST['userId']}'and mb_password=password('{$_POST['userPw']}')";
	$ret = mysqli_query($conn, $sql);

	if($ret){
		$count = mysqli_num_rows($ret);
		if($count==0){
		    echo "아이디 또는 비번이 틀립니다. <br><br>";
            echo "<a href='login.php'>다시 로그인</a>";
		}else{
		   $data = mysqli_fetch_array($ret);
		   $_SESSION['login'] = $data['mb_nick'];
		    echo "<h2>{$_SESSION['login']}님 환영합니다.</h2>";
		    echo "<p><a href='index.php'><span id='remind'></span> 메인으로 이동...</a></p>";
		    
		}
	}else{
		echo "<p>회원정보 조회 실패</p>";
	}
	mysqli_close($conn);	
   ?>
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