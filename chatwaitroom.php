<html>
<head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
?>

	<title>채팅 대기실</title>
</head>
<body>
<?php
	include_once("menu.php");

	if(isset($_SESSION['login'])){
		echo "<p>{$_SESSION['login']}님 환영합니다. 입장하고 싶은 채팅방을 골라주세요.</p>";
	}else{
		echo "<p><a href='login.php'>로그인</a> 후 입장해주세요.</p>";
	}

	$sql1 = "select * from `chatroom`";
	$ret1 = mysqli_query($conn, $sql1);

	echo "<table class='table'><thead><tr><td>번호</td><td>채팅방 이름</td><td>생성 날짜</td><td>입장</td></tr></thead><tbody>";
	while($data1 = mysqli_fetch_array($ret1)){
		$url = "chat.php?chattable={$data1['roomtable']}";
		echo "<tr><td>{$data1['roomid']}</td><td>{$data1['roomname']}</td><td>{$data1['datetime']}</td><td><a href='{$url}'>입장</a></td></tr>";
	}
	echo "</tbody></table><br><br>";
	echo "<form method='post' action='makechatroom.php'><div class='col-xs-4'><input type='text' name='newchatname' class='form-control' placeholder='새 채팅방 이름'> </div><input type='submit' class='btn btn-primary' value='만들기'></form>";

	session_start();

?>
</body>
</html>