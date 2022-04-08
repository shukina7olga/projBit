<?php
   // $mysql = new mysqli('127.0.0.1', 'root', 'password', 'mybit'); // хост, имя пользователя, пароль, имя бд


   $conn = null;

   try {
      $conn = new PDO('mysql:dbname=mybit;host=127.0.0.1', 'root', 'password');;
      $conn->exec("set names utf8");
   } catch (PDOException $exception) {
      echo "Connection error: " ;
   }
?>