<?php
	class User
	{
		// проверяем авторизован ли пользователь. узнаем есть ли в сессии данные
		public function isAuth() 
		{
			return isset($_SESSION['user']);
		}


		// если введенные логин и пароль совпали с тем, что в бд => забираем строку (запись) в переменную result и user уже массив этих данных одного пользователя
		public function login($mysql) 
		{     
			$pass = trim($_POST['pass']) ;
   			$login = trim($_POST['login']);

			$result = $mysql->prepare("SELECT * FROM `users` WHERE `user_login` = ? AND `user_pass` = ?"); // шаблон запроса
			$result->bind_param('ss', $login, $pass);
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
				'user_pass' => $user['user_pass'],
				'user_birth' => $user['user_birth'],
				'user_gend' => (int)$user['user_gend'],
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
	
			if($_SESSION['user']['user_gend'] === 1) {
				$ses_gend = 'мужчина';
			} else {
				$ses_gend = 'женщина';
			}

			$ses_mail = $_SESSION['user']['user_mail'];
			$ses_phone = $_SESSION['user']['user_phone'];

			if($_SESSION['user']['user_activity'] === 1) {
				$ses_activity = 'активен';
			} else {
				$ses_activity = 'неактивен';
			}

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

		// регистрируем пользователя. записывает данные в бд
		// не забыть про filter_var 
		public function register() 
		{
			$err = array();

			$reg_name = trim($_POST['reg_name']);
			$reg_fullname = $_POST['reg_fullname'];
			$reg_login = trim($_POST['reg_login']);
			$reg_pass = trim($_POST['reg_pass']);
			$reg_birth = $_POST['reg_birth'];
			$reg_gend = $_POST['reg_gend']; // СДЕЛАТЬ ВЫПАДАЮЩИЙ СПИСОК
			$reg_mail = trim($_POST['reg_mail']);
			$reg_phone = trim($_POST['reg_phone']);


			if(!preg_match("/^[0-9]+$/", $reg_pass) {
				$err[] = "Пароль может состоять только из цифр";
			}

			if(!preg_match("/^[a-zA-Z]+$/", $reg_login) {
				$err[] = "Логин может состоять только из букв английского алфавита";
			}
			
			//проверяем, не сущестует ли пользователя с таким логином
			$query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($reg_login)."'");

			if(mysql_result($query, 0) > 0){
				$err[] = "Пользователь с таким логином уже существует в базе данных";
			}

			// Если нет ошибок, то добавляем в БД нового пользователя
			if(count($err) == 0) {	
				//делаем двойное шифрование для пароля
				$reg_pass = md5(md5($reg_pass));
				mysql_query("INSERT INTO users SET 
					user_name='".$reg_name"',
					user_fullname='".$reg_fullname"',
				 	user_login='".$reg_login."',
					user_pass='".$reg_pass"',
					user_birth='".$reg_birth"',  
					user_gend='".$reg_gend"',
					user_mail='".$reg_mail"',
					user_phone='".$reg_phone"'
				");
			}	
		}
	}			
?>