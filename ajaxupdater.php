<html>
	<head>
<?php 
	    include_once("head.php");
?>
		<title>Ajax Updater 실습</title>
		<script src='prototype.js'></script>
	</head>
	<body>
		<h1>Ajax Updater 실습</h1>
		<form id="myform">
			<input type="number" name="x" id="x"/>
			<input type="number" name="y" id="y"/>
		</form>
		<button onclick="addXY()" class='btn'>ADD</button><br><br>
		<h2 id="resultXY">이곳에 결과값이 나옵니다.</h2>

		<script>
			function addXY(){
				new Ajax.Updater('resultXY', 'addXY.php', {
					method: 'get',
					parameters: $('myform').serialize(),
					onSuccess: function(){
						$('x').value = ''; 
						$('y').value = ''; 
					},
					onFailure: function(){
						alert("실패....ㅠㅠ");
					}
				});
			}
		</script>
	</body>
</html>
