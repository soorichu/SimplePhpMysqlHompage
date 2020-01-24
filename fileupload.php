<!DOCTYPE html>
<html>
	<head><title>업로딩....</title></head>
	<body>
		<h1>업로딩....</h1>
<?php
//파일이 업로드 될 때는 php.ini 파일의 upload_tmp_dir 지시어에 지정된 임시 디렉터리에 저장된다. 지시어가 설정되지 않으면 /tmp 같은 웹 서버의 임시 디렉터리에 저장된다. 스크립트의 실행이 끝나기 전에 그 파일을 이동/복사/이름 변경을 하지 않으면 스크립트가 끝날 때 삭제된다.
//PHP 스크립트에서 사용할 업로드 파일의 정보는 슈퍼글러벌 배열인 $_FILES에 저장된다. 그리고 $_FILES 배열의 각 항목은 HTML 폼의 input type="file"에 지정된 이름으로 저장된다. input type="file"의 name="the_file"인 경우 다음과 같다.
// $_FILES['the_file']['tmp_name'] : 웹 서버에 임시로 저장된 파일의 이름과 위치
// $_FILES['the_file']['name'] : 업로드된 실제 파일 이름
// $_FILES['the_file']['size'] : 파일의 크기(바이트)
// $_FILES['the_file']['type'] : 파일의 MIME 타입. 예를 들어, text/plain, image/png
// $_FILES['the_file']['error'] : 파일 업로드 시 발생되는 에러 코드

	echo "<p>FILES['the_file']['tmp_name'] : {$_FILES['the_file']['tmp_name']}</p>";
	echo "<p>FILES['the_file']['name'] : {$_FILES['the_file']['name']}</p>";
	echo "<p>FILES['the_file']['size'] : {$_FILES['the_file']['size']}</p>";
	echo "<p>FILES['the_file']['type'] : {$_FILES['the_file']['type']}</p>";
	echo "<p>FILES['the_file']['error'] : {$_FILES['the_file']['error']}</p>";

	if($_FILES['the_file']['error']>0){
		switch($_FILES['the_file']['error']){
			case 1:
				echo "<p>업로드 용량 초과</p>";
				break;
			case 2:
				echo "<p>파일 용량 초과</p>";
				break;
			case 3:
				echo "<p>파일이 부분적으로 업로드 됨.</p>";
				break;
			case 4:
				echo "<p>파일이 업로드 되지 않음.</p>";
				break;
			case 6:
				echo "<p>임시 폴더가 없음.</p>";
				break;
			case 7:
				echo "<p>디스크를 읽을 수 없음.</p>";
				break;
			case 8:
				echo "<p>PHP가 파일 업로드를 막음.</p>";
				break;
		}
	}

	$uploaded_file = "data/{$_FILES['the_file']['name']}";

	if(is_uploaded_file($_FILES['the_file']['tmp_name'])){
		if(!move_uploaded_file($_FILES['the_file']['temp_name'], $uploaded_file)){
			echo "<p>파일을 원하는 디렉터리 {$uploaded_file}로 옮길 수 없습니다.</p>";
			exit;
		}
	}else{
		echo "<p>파일 {$_FILES['the_file']['name']} 업로드 중 문제 발생</p>";
		exit;
	}

	echo "<img src='data/{$_FILES['the_file']['name']}'/>";

?>
	</body>
</html>