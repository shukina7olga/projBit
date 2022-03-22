<?php
	class User
	{
		public function isAuth() {
			return isset($_SESSION['user']);
		}

		public function login($mysql) {     
			$result = $mysql->prepare("SELECT * FROM `users` WHERE `user_login` = ? AND `user_pass` = ?"); // шаблон запроса
			$result->bind_param('ss', $login, $pass);
			$result->execute();
			$result = $result->get_result(); 
			$user = $result->fetch_assoc(); // конвертируем данные в массив
			return $user;
		}


		public function logout() {
			$_SESSION = [];
			header('Location: ./../auth.php');
			session_destroy(); // закрываем сессию
		}


		public function getData() {
			$ses_id = htmlspecialchars($_SESSION['user']['user_id']);         
			$ses_name = htmlspecialchars($_SESSION['user']['user_name']);
			$ses_fullName = htmlspecialchars($_SESSION['user']['user_fullName']);
	
			$ses_login = htmlspecialchars($_SESSION['user']['user_login']);
			$ses_pass = htmlspecialchars($_SESSION['user']['user_pass']);
	
			$bDate = new DateTime($_SESSION['user']['user_birth'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
			$ses_birth = $bDate->format("d.m.Y"); // сделать вывод даты без времени
	
			$ses_mail = htmlspecialchars($_SESSION['user']['user_mail']);
			$ses_phone = htmlspecialchars($_SESSION['user']['user_phone']);
			if($_SESSION['user']['user_gend'] === 1) {
				$ses_gend = 'мужчина';
			} else {
				$ses_gend = 'женщина';
			}
	
			$get_arr = array(
				'ses_id' => $ses_id,
				'ses_name' => $ses_name,
				'ses_fullName' => $ses_fullName,
				'ses_login' => $ses_login,
				'ses_pass' => $ses_pass,
				'ses_birth' => $ses_birth,
				'ses_mail' => $ses_mail,
				'ses_phone' => $ses_phone,
				'ses_gend' => $ses_gend
			);
			return $get_arr;	
		}


		// не забыть про filter_var 
		public function register() {

			$err = array();

			if(!preg_match("/^[a-zA-Z]+$/",$_POST['login'])) {
				$err[] = "Логин может состоять только из букв английского алфавита";
			}

			if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
				$err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
			}

			//проверяем, не сущестует ли пользователя с таким именем
			$query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

			if(mysql_result($query, 0) > 0){
				$err[] = "Пользователь с таким логином уже существует в базе данных";
			}

			// Если нет ошибок, то добавляем в БД нового пользователя
			if(count($err) == 0) {	
				$login = $_POST['login'];
				//Убираем лишние пробелы и делаем двойное шифрование
				$password = md5(md5(trim($_POST['password'])));
				mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
			}
			
		}
	}			
?>