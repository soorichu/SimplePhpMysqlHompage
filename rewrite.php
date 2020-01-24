<html>
<head>
    <meta charset="utf-8">
<?php
    include_once("head.php");
?>
	<title>글 수정</title>
</head>
<body>
<?php

    include_once("menu.php");

    if(isset($_GET['bo_table']) && isset($_GET['wr_id'])){

        $table = $_GET['bo_table'];
        $id = $_GET['wr_id'];

        $sql = "SELECT * FROM g5_write_{$table} WHERE wr_id={$id}";
        $ret = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($ret);

        $subject  = $data['wr_subject'];
        $content = $data['wr_content'];

        $url = "update.php?bo_table={$table}&wr_id={$id}";

    }else{
        echo "<p> 수정할 글 정보가 없습니다.</p><p><a href='board.php'>글 목록으로 돌아가기</a></p>";
    }
?>

<form method="post" action="<?php echo $url; ?>">
	<input class='form-control'type="text" name="subject" value="<?php echo $subject; ?>"/><br/><br/>
	<textarea class='form-control' rows='20' name="content"><?php echo $content; ?> </textarea><br/><br/><br/>
	<input type="submit" class="btn">
</form>


</body>

</html>


