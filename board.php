<html>
<head>
<?php
	include_once("head.php");
?>
<title>게시판</title>
</head>
<body>
<?php
	include_once("menu.php");
?>

	<table class="table table-striped">
	<thead>
		<tr>
			<td>글번호</td>
			<td>글제목</td>
			<td>글쓴이</td>
		</tr>
	</thead>
<?php

    if(isset($_GET['bo_table'])){
    $bo_table2 = $_GET['bo_table'];
	$sql2 = "select * from `g5_write_{$bo_table2}`";
	$ret2 = mysqli_query($conn, $sql2);
	
		while($data = mysqli_fetch_array($ret2)){
			$url2 = "read.php?bo_table={$bo_table2}&wr_id={$data['wr_id']}";
		    echo "<tr><td>{$data['wr_id']}</td><td> <a href='{$url2}'>{$data['wr_subject']}</a></td><td>{$data['wr_name']}</td></tr>";
		}
    }
    mysqli_close($conn);
?>
</body>
</html>









