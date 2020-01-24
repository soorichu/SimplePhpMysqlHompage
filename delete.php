<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php
	include_once("head.php");
	include_once("connect.php");
?>
	<title>삭제</title>
</head>
<body>

<?php 

	$bo_table = $_GET['bo_table'];
	$wr_id = $_GET['wr_id'];

	$sql = "delete from `g5_write_{$bo_table}` where `wr_id`={$wr_id}";
	$ret = mysqli_query($conn, $sql);

	if($ret){
		echo "<p> 삭제 성공</p>";
	}else{
		echo "<p>삭제 실패..ㅠㅠ</p>";
	}
	echo "<a href='board.php?bo_table={$bo_table}'>글 목록으로</a>";
?>

	
</body>
</html>