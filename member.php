<!Doctype html>
<html>
<head>
  <?php
  include_once("head.php");
  
?>
    <title>회원들</title>
</head>
<body>
<?php
  include_once("menu.php");
?>
<h1>홈페이지 회원 정보</h1>
<table class="table table-striped">
<thead>
    <tr>
        <td>아이디</td>
        <td>닉네임</td>
    </tr>
</thead>
<tbody>
<?php

   $sql = "select mb_id, mb_nick from g5_member";
   $ret = mysqli_query($conn, $sql);

   while($data = mysqli_fetch_array($ret)){
	echo "<tr><td>". $data['mb_id'] . "</td><td>".$data['mb_nick'] . "</td></tr>";
   }

   mysqli_close($conn);

?>
</tbody>
</table>
</body>
</html>
