<!Doctype HTML>
<html>
   <head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
?>
	<title>로그인 화면</title>
   </head>
   <body>
<?php

	include_once("menu.php");

	if(isset($_SESSION['login'])){
		echo "<p>이미 로그인 되어 있습니다..</p>";
		echo "<p><a href='index.php'>메인으로 돌아가기</a></p>";

	}else{
		echo "<h2>로그인</h2>
			<form method='post' action='login_result.php'>
			    <input type='text' class='form-control' size='20' name='userId' placeholder='ID'><br>
			    <input type='password' class='form-control' size='20' name='userPw' placeholder='password'>
			    <br><br>
			    <input type='submit' value='로그인' class='btn'>
			</form>";
	}
?>
   </body>
</html>