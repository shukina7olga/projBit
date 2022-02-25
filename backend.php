<?php 
   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';
   $fullName = 'Иванов Иван Васильевич';
   $result;

   $arr = array(
      result => $result,
      one => $name,
      two => $fullName,
      three => $pass
   );
   
   if($pass === $_POST['pass'] && $login === $_POST['login']) {     
      $arr[result] = 'success';
      $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
      echo $json;

   } else {
      $arr[result] = 'error';
      $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
      echo $json;
   }

?> 

