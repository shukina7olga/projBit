<?php 

   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';

   //$nameId = $_POST['nameId']; если можно обратиться типа nameId.color 
   //$loginId = $_POST['loginId'];
   //$passId = $_POST['passId'];

   if($name !== $_POST['name'] || $login !== $_POST['login'] || $pass !== $_POST['pass']) {
      header("Location: /index.html"); 
   }
   
   if($name === $_POST['name'] && $login === $_POST['login'] && $pass === $_POST['pass']) {
      echo "дратути";
   }

?> 

