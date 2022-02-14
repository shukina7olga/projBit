<?php 

   $login = 'barsum';
   $pass = '123';


   if($login == $_POST['login'] && $pass == $_POST['pass']) {
      echo $_POST['name'];   
   }
   
   if($login != $_POST['login']) {
      echo "Введите логин";
   }
   
   if($pass != $_POST['pass']) {
      echo "Введите пароль";
   }

?> 