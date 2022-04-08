<?php 
   //include './main/db.php';   
   // include './main/header.php';
   include './main/classes/User.php';
   
   $user = new User;
  
   $arr = array(
      'status' => 'error',
      'data' => $user->register(),
      'message' => ''
   ); 
   
 

   if(empty($user->register())) {     
      $arr['status'] = 'success';
      
   } else {
      $arr['status'] = 'error';
      $arr['message'] =  $arr['data'];
   }

  echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);


  
?> 






