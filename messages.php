<table>
<?php
	include_once('connect.php');
	if(isset($_SESSION['chattable'])){
		$sqltable = "SELECT * FROM `{$_SESSION['chattable']}` ORDER BY `message_id` DESC";
		$rettable = mysqli_query($conn, $sqltable);

		while($datatable = mysqli_fetch_array($rettable)){
			echo "<tr class='chatin'><td><button class='btn btn-default'>{$datatable[1]}</button></td><td>{$datatable[2]}<span class='datetime'>{$datatable[3]}</span></td></tr>";
		}
	}else{
		echo "<script>alert('채팅방정보 없음');</script>";
	}
?>
</table>