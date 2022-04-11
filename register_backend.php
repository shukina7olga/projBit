<?php 
   //require_once './main/db.php';   
   // include './main/header.php';



   $mysql = mysqli_connect('127.0.0.1', 'root', 'password', 'mybit'); // хост, имя пользователя, пароль, имя бд
   
   $reg_name = $_POST['reg_name'];
   $reg_fullname = $_POST['reg_fullname'];
   $reg_login = $_POST['reg_login'];
   $reg_pass = $_POST['reg_pass'];
   $reg_birth = $_POST['reg_birth'];
   $reg_gend = $_POST['reg_gend'];
   $reg_mail = $_POST['reg_mail'];
   $reg_phone = $_POST['reg_phone'];


   $err = array();


   if(!preg_match("/^[0-9]+$/", $reg_pass)) {
      $err[] = "Пароль может состоять только из цифр";
      // $err['err_field'] = $reg_pass;
   }

   if(!preg_match("/^[a-zA-Z]+$/", $reg_login)) {
      $err[] = "Логин может состоять только из букв английского алфавита";
      // $err['err_field'] = $reg_login;
   }

   if($reg_name === '') {
      $err[] = "Заполните поле никнейм";
      // $err['err_field'] = $reg_name;
   }

   if($reg_fullname === '') {
      $err[] = "Заполните поле ФИО";
      // $err['err_field'] = $reg_fullname;
   }

   if($reg_login === '') {
      $err[] = "Заполните поле логин";
      // $err['err_field'] = $reg_login;
   }

   if($reg_pass === '') {
      $err[] = "Заполните поле пароль";
      // $err['err_field'] = $reg_pass;
   }

  
   $arr = array(
      'status' => 'error',
      'data' => [],
      'message' => ''
   ); 
   


   if(empty($err)) {     
      

      $query = mysqli_query($mysql, "INSERT INTO `users` (`user_activity`, `user_name`, `user_fullname`, `user_login`, `user_pass`, `user_birth`, `user_gend`, `user_mail`, `user_phone`) VALUES 
      (1, '{$reg_name}', '{$reg_fullname}', '{$reg_login}', '{$reg_pass}', '{$reg_birth}', {$reg_gend}, '{$reg_mail}', '{$reg_phone}')");
      if ($query) {
         // echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
      } else {
         echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
      } 
      
      $arr['status'] = 'success';
   } else {
      $arr['status'] = 'error';
      $arr['message'] = $err;
   }

  echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  $mysql->close();

  
?> 






