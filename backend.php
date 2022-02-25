<?php 
   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';
   $fullName = 'Иванов Иван Васильевич';


   if($pass === $_POST['pass'] && $login === $_POST['login']) {
 
      $arr = array(
         one => $name,
         two => $fullName,
         three => $pass
      );
      $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
      echo $json;
   }

?> 

