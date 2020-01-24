<!Doctype HTML>
<html>
<head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
?>
	<title> 게시판 글 쓰기 </title>
</head>
<body>
<?php

	include_once("menu.php");

	$datetime = substr(date('c'), 0, 10) . " " . substr(date('c'), 11, 8);
    $table = $_POST['table'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$name = "정수영";

	$sql1 = "select wr_id from g5_write_dbdata order by wr_id desc";
	$ret1 = mysqli_query($conn, $sql1);

	$id = mysqli_fetch_array($ret1)['wr_id']+1;
    $num = $id *(-1);

	$sql2 = "INSERT INTO `g5_write_{$table}`(wr_id, wr_num, wr_subject, wr_content, wr_datetime, wr_name) VALUES({$id}, {$num}, '{$subject}', '{$content}', '{$datetime}', '{$name}')";
	$ret2 = mysqli_query($conn, $sql2);

	if($ret2){
		echo "<p> 글 올리기 성공!</p>";
	}else{
		echo "<p> 실패..ㅠㅠ </p>";
	}

    echo "<a href='board.php?bo_table={$table}'><button class='btn'>게시판 바로가기</button></a> ";
    echo "<a href='read.php?bo_table={$table}&wr_id={$id}'><button class='btn'>글보기</button></a>";

	mysqli_close($conn); 
?>

</body>
</html>