<?php 
   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';

   if($pass === $_POST['pass'] || $login === $_POST['login']) {
      ?>
      <div class='fault'>
         <h2>Добро пожаловать, <?=$name?></h2>
         <a class='fault-btn' href='/index.html'>Попробовать снова</a>
      </div>
      <?php 
      } else { ?>
      <div class='fault'>
         <h2>Неверный логин или пароль</h2>
         <a class='fault-btn' href='/index.html'>Войти как другой пользователь</a>
      </div>
   <?php 
   }

?> 

