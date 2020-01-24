<!DocType HTML>
<html>
<head>
<?php
  include_once("head.php");
  include_once("connect.php");
?>
<meta charset="UTF-8">
    <title>아두이노 테스트 01</title>
</head>
<body>
<?php
  include_once("menu.php");
?>
  <form method="GET" action="gettest01.php">
  <div class="col-xs-2">
    <input type="number" name="num1" placeholder="num1(필수)" class="form-control"> 
    <input type="number" name="num2" placeholder="num2" class="form-control"> 
    <input type="number" name="num3" placeholder="num3" class="form-control"> 
    <input type="number" name="num4" placeholder="num4" class="form-control"> 
  </div>
  <div class="col-xs-4">
    <input type="text" name="text1" placeholder="text1" class="form-control"> 
    <input type="text" name="text2" placeholder="text2" class="form-control"> 
    <input type="text" name="text3" placeholder="text3" class="form-control"> 
    <input type="text" name="text4" placeholder="text4" class="form-control"> 
  </div>
  <br><br><br><br>
    <input type="submit" class="btn">
  </form><br><br><br>

<?php
    
    $datetime = substr(date('c'), 0, 10) . " " . substr(date('c'), 11, 8);
    if(isset($_GET['num1']) || isset($_GET['num2']) || isset($_GET['num3']) ||isset($_GET['num4']) || isset($_GET['text1']) || isset($_GET['text2']) || isset($_GET['text3']) || isset($_GET['text4'])){

      $num1 = isset($_GET['num1']) ? $_GET['num1']: 0;
      $num2 = isset($_GET['num2']) ? $_GET['num2']: 0;
      $num3 = isset($_GET['num3']) ? $_GET['num3']: 0;
      $num4 = isset($_GET['num4']) ? $_GET['num4']: 0;
      $text1 = isset($_GET['text1']) ? $_GET['text1']: "";
      $text2 = isset($_GET['text2']) ? $_GET['text2']: "";
      $text3 = isset($_GET['text3']) ? $_GET['text3']: "";
      $text4 = isset($_GET['text4']) ? $_GET['text4']: "";

      $sql1 = "insert into `arduino`(`num1`, `num2`, `num3`, `num4`, `text1`, `text2`, `text3`, `text4`, `datetime`) values({$num1} , {$num2}, {$num3}, {$num4}, '{$text1}', '{$text2}' , '{$text3}' , '{$text4}', '{$datetime}')";
      $ret1 = mysqli_query($conn, $sql1);

      if($ret1){
        echo "<p>Success</p>";
      }
    }

    if(isset($_GET['delid'])){
      $sql2 = "delete from `arduino` where `id`={$_GET['delid']}";
      $ret2 = mysqli_query($conn, $sql2);

      if($ret2){
        echo "<p>Success to delete id={$_GET['delid']}</p>";
      }
    }
?>
  <table class="table">
    <thead>
      <tr>
        <td>id</td>
        <td>num1</td>
        <td>num2</td>
        <td>num3</td>
        <td>num4</td>
        <td>text1</td>
        <td>text2</td>
        <td>text3</td>
        <td>text4</td>
        <td>datetime</td>
        <td>수정</td>
      </tr>
    </thead>
    <tbody>
<?php
    
    $sql2 = "select * from `arduino`";
    $ret2 = mysqli_query($conn, $sql2);

    while($data = mysqli_fetch_array($ret2)){
      echo "<tr id='{$data['id']}'><td>{$data['id']}</td><td>{$data['num1']}</td><td>{$data['num2']}</td><td>{$data['num3']}</td><td>{$data['num4']}</td><td>{$data['text1']}</td><td>{$data['text2']}</td><td>{$data['text3']}</td><td>{$data['text4']}</td><td>{$data['datetime']}</td><td><a href='gettest01.php?delid={$data['id']}'>삭제</a></td></tr>";
    }
    
    mysqli_close($conn);
    
?>
    </tbody>
  </table>
    
    
    </body>
</html>
