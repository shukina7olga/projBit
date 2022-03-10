<?php 

   session_start();

   $pass = trim($_POST['pass']) ;
   $login = trim($_POST['login']);

   
   $mysql = new mysqli('127.0.0.1', 'root', 'password', 'mybit');

   $result = $mysql->prepare("SELECT * FROM `users` WHERE `user_login` = ? AND `user_pass` = ?"); // шаблон запроса
   $result->bind_param('ss', $login, $pass);
   $result->execute();
   $result = $result->get_result(); 
   $user = $result->fetch_assoc(); // конвертируем данные в массив
   

   $fullName = $user['user_fullName'];


   $arr = array(
      'status' => 'error',
      'data' => [],
      'message' => ''
   ); 


   $ses_arr = array(
      'status' => 'false',
      'user_id' => $user['user_id'],
      'user_name' => $user['user_name'],
      'user_fullName' => $user['user_fullName'],
      'user_login' => $user['user_login'],
      'user_pass' => $user['user_pass']
   );

   

   
   if(count($user) !== 0) {     
      $arr['status'] = 'success';
      $arr['data'] = [
         'full_name' => $fullName
      ];

      $ses_arr['status'] = 'true';

   } else {
      $arr['status'] = 'error';
      $arr['message'] = 'неверный логин или пароль';
   }

   $_SESSION['user'] = $ses_arr;

  echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  $mysql->close(); // закрыть соединение

  //session_destroy(); // закрыть сессию
   
?> 






