<?php 
   $name = 'Bars';
   $login = 'barsum';
   $pass = '123';
   $fullName = 'Иванов Иван Васильевич';


   if($pass === $_POST['pass'] && $login === $_POST['login']) {
      ?>
      <div class='fault'>
         <h2>Добро пожаловать, <?=$name?>, вы зашли как <?=$fullName?></h2>
         <a class='fault-btn' href='/index.html'>Войти как другой пользователь</a>
      </div>
      
      <?php 
      $arr = array(
         1 => $name,
         2 => $fullName,
         3 => $pass
      );
      $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
      //header('Content-Type: application/json');
      echo $json;
      // file_put_contents('./my.json', $json);

      // $json = json_encode($_POST); реально создаёт файл с json !!!
      // $file = fopen('token_data.json','w+');
      // fwrite($file, $json);
      // fclose($file);

      } else { ?>
      <div class='fault'>
         <h2>Неверный логин или пароль</h2>
         <a class='fault-btn' href='/index.html'>Попробовать снова</a>
      </div>
   <?php 
   }

?> 

