<?php
	class User
	{
		// для очищения от лишних символов
		public function test_input($data) 
		{ 
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);   
			return $data;
		}

		// проверяем авторизован ли пользователь. узнаем есть ли в сессии данные
		public function isAuth() 
		{
			return isset($_SESSION['user']);
		}


		// если введенные логин и пароль совпали с тем, что в бд => забираем строку (запись) в переменную result и user уже массив этих данных одного пользователя
		public function login() 
		{    
			//session_start(); // надо ли это  тут?
			global $mysql;
			$pass = $this->test_input($_POST['pass']) ;
   			$login = $this->test_input($_POST['login']);
			$result = $mysql->prepare("SELECT * FROM `users` WHERE `user_login` = ? AND `user_pass` = ?"); // шаблон запроса
			$result->bind_param('ss', $login, md5($pass));
			$result->execute();
			$result = $result->get_result(); 
			$user = $result->fetch_assoc(); // конвертируем данные в массив
			return $user;
		}

		// если вызвали метод, то закрыли сессию
		public function logout() 
		{
			$_SESSION = [];
			session_destroy(); // закрываем сессию
			header('Location: ./../auth.php');
		}

		// запись данных о пользователе в сессию
		public function setData($user) 
		{     
			$ses_arr = array(
				'user_id' => $user['user_id'],
				'user_name' => $user['user_name'],
				'user_fullName' => $user['user_fullName'],
				'user_login' => $user['user_login'],
				'user_pass' => $user['user_pass'], // наверное в сессии лучше не хранить пароль
				'user_birth' => $user['user_birth'],
				'user_gend' => (int)$user['user_gend'], // получаем либо 1 либо 0
				'user_mail' => $user['user_mail'],
				'user_phone' => $user['user_phone'],
				'user_activity' => $user['user_activity'],
				'user_entr' => $user['user_entr'],
				'user_registration' => $user['user_registration']
			);
			$_SESSION['user'] = $ses_arr;
			return $_SESSION['user'];
		}


		// получаем данные о пользователе из сессии
		public function getData() 
		{
			$ses_id = $_SESSION['user']['user_id'];         
			$ses_name = $_SESSION['user']['user_name'];
			$ses_fullName = $_SESSION['user']['user_fullName'];
	
			$ses_login = $_SESSION['user']['user_login'];
			$ses_pass = $_SESSION['user']['user_pass'];
	
			$bDate = new DateTime($_SESSION['user']['user_birth'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
			$ses_birth = $bDate->format("d.m.Y"); // сделать вывод даты без времени
	
			$ses_gend = ($_SESSION['user']['user_gend'] === 1) ? 'мужчина' : 'женщина';

			$ses_mail = $_SESSION['user']['user_mail'];
			$ses_phone = $_SESSION['user']['user_phone'];

			$ses_activity = ($_SESSION['user']['user_activity'] === 1) ? 'активен' : 'неактивен';
			
			$entrDate = new DateTime($_SESSION['user']['user_entr'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
			$ses_entr = $entrDate->format("d.m.Y"); // сделать вывод даты без времени	

			$registrationDate = new DateTime($_SESSION['user']['user_registration'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
			$ses_registration = $registrationDate->format("d.m.Y"); // сделать вывод даты без времени	

	
			$get_arr = array(
				'ses_id' => $ses_id,
				'ses_name' => $ses_name,
				'ses_fullName' => $ses_fullName,
				'ses_login' => $ses_login,
				'ses_pass' => $ses_pass,
				'ses_birth' => $ses_birth,
				'ses_gend' => $ses_gend,
				'ses_mail' => $ses_mail,
				'ses_phone' => $ses_phone,
				'ses_activity' => $ses_activity,
				'ses_entr' => $ses_entr,
				'ses_registration' => $ses_registration
			);
			return $get_arr;	
		}


		// регистрируем пользователя. записывает данные в бд. смотрим есть ли такой пользователь
		public function register() 
		{
			global $mysql;	

			$reg_name = $this->test_input(preg_replace("/\s+/", "", $_POST['reg_name'])); // чистим от пробелов
			$reg_fullname = $this->test_input($_POST['reg_fullname']); 
			$reg_login = $this->test_input(preg_replace("/\s+/", "", $_POST['reg_login']));
			$reg_pass = $this->test_input($_POST['reg_pass']);
			$reg_birth = $_POST['reg_birth'];
			$reg_gend = $_POST['reg_gend'];
			$reg_mail = filter_var($_POST['reg_mail'], FILTER_SANITIZE_EMAIL);  
			$reg_phone = $this->test_input($_POST['reg_phone']);
		
		
			$err = array();
		
		
			if(!preg_match("/^[0-9]+$/", $reg_pass)) {
				$err[] = "Пароль может состоять только из цифр";
			} 
		
			if(!preg_match("/^[a-zA-Z]+$/", $reg_login)) {
				$err[] = "Логин может состоять только из букв английского алфавита";
			}
		
			if($reg_name === '') {
				$err[] = "Заполните поле никнейм";
			}
		
			if($reg_fullname === '') {
				$err[] = "Заполните поле ФИО";
			}
		
			if($reg_login === '') {
				$err[] = "Заполните поле логин";
			}
		
			if($reg_pass === '') {
				$err[] = "Заполните поле пароль";
			}

			if($reg_birth === '') {
				$err[] = "Заполните дату рождения";
			}
		
			// проверяем есть ли такой пользователь
			$query_check = mysqli_query($mysql, "SELECT * FROM `users` WHERE user_login = '{$reg_login}'");
			$user_in_bd = mysqli_fetch_assoc($query_check);
			if($user_in_bd !== NULL) {
				$err[] = "Пользователь с таким логином уже существует в базе данных";
			}   
			
			if(empty($err)) {
				$reg_pass = md5($reg_pass);
				$query = mysqli_query($mysql, "INSERT INTO `users` (`user_activity`, `user_name`, `user_fullname`, `user_login`, `user_pass`, `user_birth`, `user_gend`, `user_mail`, `user_phone`) VALUES 
				(1, '{$reg_name}', '{$reg_fullname}', '{$reg_login}', '{$reg_pass}', '{$reg_birth}', {$reg_gend}, '{$reg_mail}', '{$reg_phone}')");
				if ($query) {
					// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
				} else {
					echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
				} 
			}
			return $err;
			
		}



		// при условии, что будет сверстана ещё одна форма с уменьшенным числом инпутов (логина не будет) 
		public function update()
		{
			session_start();
			global $mysql;

			$user_id = $_SESSION['user']['user_id'];

			$err = array();

			$up_name = $this->test_input(preg_replace("/\s+/", "", $_POST['reg_name']));
			$up_fullname = $this->test_input($_POST['reg_fullname']); 
			// $up_login = test_input($_POST['up_login']);  Андрей сказал, что пользователю не дают править логин
			$up_birth = $_POST['reg_birth'];
			$up_gend = $_POST['reg_gend'];
			$up_mail = filter_var($_POST['reg_mail'], FILTER_SANITIZE_EMAIL);  
			$up_phone = $this->test_input($_POST['reg_phone']);

			// для смены пароля
			$user_id = $_SESSION['user']['user_id'];
			$old_pass = $this->test_input($_POST['old_pass']);
			$old_pass_hesh = md5($old_pass);
			$new_pass = $this->test_input($_POST['new_pass']);
			$new_check_pass = $this->test_input($_POST['new_check_pass']);


			$user_pass_hesh = $_SESSION['user']['user_pass']; // берем хеш пароля, что лежит в бд. ниже на случай если надо брать из бд
			// $user_pass = mysqli_query($mysql, "SELECT * FROM `users` WHERE user_id = '{$user_id}'");
			// $pass_mass = mysqli_fetch_all($user_pass, MYSQLI_ASSOC);
			// $user_pass_hesh = $pass_mass[0]['user_pass'];


			if($old_pass_hesh !== $user_pass_hesh && $old_pass != '') {
				$err[] = "Текущий пароль ошибочен";
			}

			if(!preg_match("/^[0-9]+$/", $new_pass) && $new_pass != '') {
				$err[] = "Новый пароль может состоять только из цифр";
			}

			if($new_pass !== $new_check_pass) {
				$err[] = "Пароль подтверждён некорректно";
			}

			$new_pass_hesh = md5($new_pass);

			if($err === []) {
				$query = mysqli_query($mysql, "UPDATE `users` SET  `user_name`='$up_name',
				`user_fullname`='$up_fullname', `user_birth`='$up_birth', `user_gend`='$up_gend',
				`user_mail`='$up_mail', `user_phone`='$up_phone', `user_pass`='$new_pass_hesh'  WHERE `user_id`=$user_id");
				if ($query) {
					// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
				} else {
					echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
				} 
			} else {
				return $err;
			}
			

		}
		

		// чтобы при редактировании в полях был текст, который будем менять
		public function  watchEditedUser() 
		{
			global $mysql;
			if(isset($_GET['edit'])) {
				$id = $_GET['edit'];
				$user_inf = mysqli_query($mysql, "SELECT * FROM `users` WHERE user_id = '{$id}'");
				$inform = mysqli_fetch_all($user_inf, MYSQLI_ASSOC);
				return $inform;
			}
		}


		public function passEdit()
		{
			global $mysql;
			

			

			
			


			

			if(empty($err)) {
				$query = mysqli_query($mysql, "UPDATE `users` SET  `user_pass`=''  WHERE `user_id`=md5($user_id)");
				if ($query) {
					// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
				} else {
					echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
				} 
			} else {
				
			}

		}

	}			
?>