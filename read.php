<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
?>
	<title>글 읽기</title>
</head>
<body>
<?php
	include_once("menu.php");

	//read.php?bo_table="table값"&wr_id="id값"에서 
	$bo_table = $_GET['bo_table'];  //bo_table을 GET 방식으로 읽고
	$wr_id = $_GET['wr_id'];        //wr_id를 GET 방식으로 읽는다.

	$sql = "select * from g5_write_{$bo_table} where wr_id={$wr_id}";
	$ret = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ret);
	
	$subject = $data['wr_subject'];
	$content = $data['wr_content'];
	$name = $data['wr_name'];
	mysqli_close($conn);
?>
	<h1><?php echo $subject; ?></h1>
	<div> 글쓴이 : <?php echo $name; ?></div><br>
	<div class="content"><?php echo $content; ?></div><br>

	<?php 
	echo "<a href='rewrite.php?bo_table={$bo_table}&wr_id={$wr_id}'><button class='btn'>수정</button></a> ";

	echo "<a href='delete.php?bo_table={$bo_table}&wr_id={$wr_id}'><button class='btn'>삭제</button></a> ";
	echo "<a href='board.php?bo_table={$bo_table}'><button class='btn'>목록</button></a> ";

	echo "<a href='write.php'><button class='btn'>새글</button></a>";

	?>

	
</body>
</html>