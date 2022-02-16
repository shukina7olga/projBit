<?php 

   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';

   //$nameId = $_POST['nameId']; если можно обратиться типа nameId.color 
   //$loginId = $_POST['loginId'];
   //$passId = $_POST['passId'];


   if($pass !== $_POST['pass'] && $login !== $_POST['login']) {
      echo 
      "<div style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;'>
         <h2>Неверный логин и пароль!</h2>
         <a style='display: inline-block; 
            text-decoration: none; 
            background: #cbf95a;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            color: black;' 
            href='/index.html'>Попробовать снова</a>
      </div>";
   }

   if($login !== $_POST['login']) {
      echo 
      "<div style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;'>
         <h2>Неверный логин!</h2>
         <a style='display: inline-block; 
            text-decoration: none; 
            background: #cbf95a;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            color: black;' 
            href='/index.html'>Попробовать снова</a>
      </div>";
   }

   if($pass !== $_POST['pass']) {
      echo 
      "<div style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;'>
         <h2>Неверный пароль!</h2>
         <a style='display: inline-block; 
            text-decoration: none; 
            background: #cbf95a;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            color: black;' 
            href='/index.html'>Попробовать снова</a>
      </div>";
   }

   if($login === $_POST['login'] && $pass === $_POST['pass']) {
      echo 
      "<div style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;'>
         <h2>Добро пожаловать, ${name} </h2>
         <a style='display: inline-block; 
            text-decoration: none; 
            background: #cbf95a;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            color: black;' 
            href='/index.html'>Войти как другой пользователь</a>
      </div>";
   }

?> 

