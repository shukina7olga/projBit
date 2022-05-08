<?php 
   include './main/db.php';
   include './main/classes/User.php';
   session_start();


   $userobj = new User;
   $user = $userobj-> login();

   $fullName = $user['user_fullName'];
   

   $arr = array(
      'status' => 'error',
      'data' => [],
      'message' => ''
   ); 
  

   if(count($user) !== 0) {    
       
      $arr['status'] = 'success';
      $arr['data'] = [
         'full_name' => $fullName
      ];
      $userobj->setData($user);

   } else {
      $arr['status'] = 'error';
      $arr['message'] = 'неверный логин или пароль';
   }


   echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

   $mysql->close(); // закрыть соединение
  
?> 






