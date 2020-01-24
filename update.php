<!Doctype HTML>
<html>
<head>
    <meta charset="utf-8">
<?php
	include_once("head.php");
?>
    <title> 게시판 글 수정 </title>
</head>
<body>
<?php

	include_once("menu.php");

	$datetime = substr(date('c'), 0, 10) . " " . substr(date('c'), 11, 8);
    $table = $_GET['bo_table'];
    $id = $_GET['wr_id'];
	$subject = htmlspecialchars($_POST['subject'], ENT_QUOTES);
	$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
	
    $sql = "UPDATE g5_write_{$table} SET wr_subject='{$subject}', wr_content='{$content}', wr_datetime='{$datetime}' WHERE wr_id={$id}";
	$ret = mysqli_query($conn, $sql);

	if($ret){
		echo "<p> 글 수정 성공!</p>";
	}else{
		echo "<p> 실패..ㅠㅠ </p>";
	}


    echo "<a href='board.php?bo_table={$table}'><button class='btn'>게시판 바로가기</button></a> ";
    echo "<a href='read.php?bo_table={$table}&wr_id={$id}'><button class='btn'>글보기</button></a>";

	mysqli_close($conn); 
?>

</body>
</html>

