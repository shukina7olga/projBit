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

