<?php
	include_once('connect.php');
	if(!isset($_SESSION['login'])){
		echo "<script>alert('로그인 후 접속하세요.'); window.location.href='login.php'; </script>";
	}

	if(isset($_GET['chattable'])){
		$_SESSION['chattable'] = $_GET['chattable'];
	}

	if(!isset($_SESSION['chattable'])){
		echo "<script>alert('채팅방 정보가 없습니다. 다시 입장해주세요.'); window.location.href='chatwaitroom.php';</script>";
	}

	$sqlchat = "select `roomname` from `chatroom` where `roomtable`='{$_SESSION['chattable']}'";
	$retchat = mysqli_query($conn, $sqlchat);
	if($datachat = mysqli_fetch_array($retchat)){
		$roomname = $datachat['roomname'];
	}else{
		echo "<script>alert('채팅방 정보가 유효하지 않습니다. 다시 입장해주세요.'); window.location.href='chatwaitroom.php';</script>";
	}
	
?>

<html>
<head>
	<meta charset='utf-8'>
	<?php include_once('head.php');?>
	<title><?php echo $roomname; ?></title>
	<script src='prototype.js'></script>
</head>
<body>
	<?php include_once('menu.php'); ?>
<div class='container' class='col-xs3-'>
	<h3><?php echo $roomname; ?></h3>
	<form id='chatmessage'>
	<h4>닉네임 <input type='text' class='form-control' name='username' value='<?php echo $_SESSION['login']; ?>'></h4>
	<div id='chat'></div><br>
	<textarea id='messagetext' name='message' class='form-control'></textarea>
	</form>
	<button onclick='addMessage()' class='btn'>TALK</button>
</div>
	<script>
		function addMessage(){
			new Ajax.Updater('chat', 'add.php', {
				method: 'post',
				parameters: $('chatmessage').serialize(),
				onSuccess: function(){
					$('messagetext').value = '';
				}
			});
		}

		function getMessages(){
			new Ajax.Updater('chat', 'messages.php', {
				onSuccess: function() { window.setTimeout(getMessages, 1000);
				}
			});
		}
		getMessages();
	</script>
</body>
</html>