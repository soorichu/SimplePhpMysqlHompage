<html>
<head>
    <meta charset="utf-8">
<?php
    include_once("head.php");
?>
	<title>글 쓰기</title>
</head>
<body>
<?php

    include_once("menu.php");

    $sql = "select bo_table, bo_subject from g5_board";
    $ret = mysqli_query($conn, $sql);
?>

<form method="post" action="upload.php">
<select name="table" size="1">
    <?php 
        while($data = mysqli_fetch_array($ret)){
            echo "<option value='{$data['bo_table']}'> {$data['bo_subject']} </option>";  
        }
        mysqli_close($conn);
    ?>
</select><br/><br/>
	<input class='form-control' type="text" name="subject" placeholder="Title"/><br/><br/>
	<textarea class='form-control' rows='10' name="content"> </textarea><br/><br/><br/>
	<input type="submit" class="btn">
</form>


</body>

</html>


