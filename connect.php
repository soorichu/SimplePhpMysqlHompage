<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	session_start();
   $server = 'localhost';
   $user = 'soori';
   $password = 'mysql1234';
   $db_name= 'soori';
   
   $conn = mysqli_connect($server, $user, $password, $db_name);

   if(!$conn){
      echo die("DB connect Error " . $conn->connect_error);
   }
?>
