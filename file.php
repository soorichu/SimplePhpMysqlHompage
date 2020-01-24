<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"><title>파일 업로드</title>
</head>
<body>
	<h1>파일 업로드</h1>
	<form action="fileupload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="1024000"/>
		<label for="the_file">파일 선택하기</label>
		<input type="file" name="the_file" id="the_file"/>
		<input type="submit" value="파일 업로드"/>
	</form>
</body>
</html>