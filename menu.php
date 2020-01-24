<div class="header">
<a href='index.php'>
<h1>
    TEST HOMPAGE by PHP MySQL AJAX
</h1>
</a>
</div>
<nav class="nav1">
<?php

    include_once("connect.php");
    $sqlnav = "select `bo_table`, `bo_subject` from `g5_board`";
    $retnav = mysqli_query($conn, $sqlnav);

    while($datanav = mysqli_fetch_array($retnav)){
    	$bo_table = $datanav['bo_table'];
    	$bo_subject = $datanav['bo_subject'];
		$urlnav = "board.php?bo_table={$bo_table}";
		echo "<a class='nav' href='{$urlnav}' style='margin:20px'> {$bo_subject} </a> ";
    }

?>
</nav><br><br><br><br><br>
<div class="nav2">
    <a href='cookie.php'><button class="btn btn-default">쿠키</button></a> 
    <a href='session.php'><button class="btn btn-default">세션</button></a> 
    <a href='write.php'><button class="btn btn-default">글 쓰기</button></a> 
<?php
    if(isset($_SESSION['login'])){
        echo "  <a href='logout.php'><button class='btn btn-default'>로그아웃</button></a>";
    }else{
        echo "  <a href='login.php'><button class='btn btn-primary'>로그인</button></a>";
    }

?>
    <a href='member.php'><button class="btn btn-default">회원보기</button></a>
    <a href='chatwaitroom.php'><button class="btn btn-default">채팅</button></a>
    <br><br>
</div>