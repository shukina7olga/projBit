<?php 
   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';
   $fullName = 'Иванов Иван Васильевич';


   $arr = array(
      'status' => 'error',
      'data' => [],
      'message' => ''
   );
   
   if($pass === $_POST['pass'] && $login === $_POST['login']) {     
      $arr['status'] = 'success';
      $arr['data'] = [
         'full_name' => $fullName
      ];

   } else {
      $arr['status'] = 'error';
      $arr['message'] = 'неверный логин или пароль';
   }

  echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
   
?> 

