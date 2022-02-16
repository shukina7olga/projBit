<?php 
   echo "<link rel='stylesheet' href='style.css'>";

   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';

   if($pass !== $_POST['pass'] || $login !== $_POST['login']) {
      echo 
      "<div class='fault'>
         <h2>Неверный логин или пароль!</h2>
         <a class='fault-btn' href='/index.html'>Попробовать снова</a>
      </div>";
   }

   if($login === $_POST['login'] && $pass === $_POST['pass']) {
      echo 
      "<div class='fault'>
         <h2>Добро пожаловать, ${name} </h2>
         <a class='fault-btn' href='/index.html'>Войти как другой пользователь</a>
      </div>";
   }

?> 

