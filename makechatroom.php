<?php
if(array_key_exists( 'newchatname', $_POST )){
	include_once("connect.php");
	$sql1 = "select roomid from chatroom order by roomid desc";
	$ret1 = mysqli_query($conn, $sql1);
	$data1 = mysqli_fetch_array($ret1);

	if($ret1){
		echo "<p>ret1 OK</p>";
	}else{
		echo "<p>ret1 Fail</p>";
	}

	$chattable = $data1['roomid']+1;
	$chattable = "messages_".$chattable;
	$chatname = $_POST['newchatname'];
	$datetime = substr(date('c'), 0, 10) . " " . substr(date('c'), 11, 8);

	$sql2 = "insert into chatroom(roomtable, roomname, datetime) values('{$chattable}', '{$chatname}', '{$datetime}')";
	$ret2 = mysqli_query($conn, $sql2);

	if($ret2){
		echo "<p>ret2 OK</p>";
	}else{
		echo "<p>ret2 Fail</p>";
	}

	$sql3 = "create table {$chattable}( message_id integer not null auto_increment, username varchar(255) not null, message text, chattime datetime, primary key (message_id))";
	$ret3 = mysqli_query($conn, $sql3);
	if($ret3){
		echo "<p>ret3 OK</p>";
	}else{
		echo "<p>ret3 Fail</p>";
	}
	if($ret2 && $ret3)
		echo "<script>alert('Success Making {$chatname}!'); window.location.href='chatwaitroom.php';</script>";
	else
		echo "<script>alert('Fail Making {$chatname}!');window.location.href='chatwaitroom.php';</script>";
}else{
	echo "<script>alert('There is no chatroomname!');window.location.href='chatwaitroom.php';</script>";
}


?>
