<?php 
   require_once './main/db.php';   

   
   function test_input($data) { // для очищения от лишних символов
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);   
      return $data;
   }
   
   $reg_name = test_input(preg_replace("/\s+/", "", $_POST['reg_name']));
   $reg_fullname = test_input($_POST['reg_fullname']); 
   $reg_login = test_input(preg_replace("/\s+/", "", $_POST['reg_login']));
   $reg_pass = test_input($_POST['reg_pass']);
   $reg_birth = test_input($_POST['reg_birth']);
   $reg_gend = test_input($_POST['reg_gend']);
   $reg_mail = test_input(filter_var($_POST['reg_mail'], FILTER_SANITIZE_EMAIL));  
   $reg_phone = test_input($_POST['reg_phone']);


   $err = array();


   if(!preg_match("/^[0-9]+$/", $reg_pass)) {
      $err[] = "Пароль может состоять только из цифр";
   }

   if(!preg_match("/^[a-zA-Z]+$/", $reg_login)) {
      $err[] = "Логин может состоять только из букв английского алфавита";
   }

   if($reg_name === '') {
      $err[] = "Заполните поле никнейм";
   }

   if($reg_fullname === '') {
      $err[] = "Заполните поле ФИО";
   }

   if($reg_login === '') {
      $err[] = "Заполните поле логин";
   }

   if($reg_pass === '') {
      $err[] = "Заполните поле пароль";
   }

   // проверяем есть ли такой пользователь
   $query_check = mysqli_query($mysql, "SELECT * FROM `users` WHERE user_login = '{$reg_login}'");
   $user_in_bd = mysqli_fetch_assoc($query_check);
   if($user_in_bd !== NULL) {
      $err[] = "Пользователь с таким логином уже существует в базе данных";
   }   

   $arr = array(
      'status' => 'error',
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






