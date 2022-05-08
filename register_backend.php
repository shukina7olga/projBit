<?php 
   include './main/db.php'; 
   include './main/classes/User.php';

   $user = new User;
   $err = $user->register();

   $arr = array(
      'status' => 'error',
      'message' => ''
   ); 
   
   if(empty($err)) {         
      $arr['status'] = 'success';
   } else {
      $arr['status'] = 'error';
      $arr['message'] = $err;
   }


   echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

   $mysql->close();

  
?> 






