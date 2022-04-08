<?php
	class User
	{
		// // для очищения данных введенных в инпуты  ?? не понимаю как вызвать это в методе  login и register
		// public function clear_input($data) 
		// { 
		// 	$data = trim($data);
		// 	$data = stripslashes($data);
		// 	$data = htmlspecialchars($data);
		// 	return $data;
		// }

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
		public function setData() 
		{     
			$ses_arr = array(
				'user_id' => $user['user_id'],
				'user_name' => $user['user_name'],
				'user_fullName' => $user['user_fullName'],
				'user_login' => $user['user_login'],
				'user_pass' => $user['user_pass'],
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


		// регистрируем пользователя. записывает данные в бд
		// не забыть про filter_var 
		public function register() 
		{
			// $host = "127.0.0.1";
			// $db_name = "mybit";
			// $username = "root";
			// $password = "password";
			// $conn;
		
			// $this->conn = null;
		
			// try {
			// 	$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			// 	$this->conn->exec("set names utf8");
			// } catch (PDOException $exception) {
			// 	echo "Connection error: " . $exception->getMessage();
			// }

			
			if(isset($_POST['submit'])) {
				$reg_name = $_POST['reg_name'];
				$reg_fullname = $_POST['reg_fullname'];
				$reg_login = $_POST['reg_login'];
				$reg_pass = $_POST['reg_pass'];
				$reg_birth = $_POST['reg_birth'];
				$reg_gend = $_POST['reg_gend'];
				$reg_mail = $_POST['reg_mail'];
				$reg_phone = $_POST['reg_phone'];


				$err = array();


				if(!preg_match("/^[0-9]+$/", $reg_pass)) {
					$err[] = "Пароль может состоять только из цифр";
					// $err['err_field'] = $reg_pass;
				}
	
				if(!preg_match("/^[a-zA-Z]+$/", $reg_login)) {
					$err[] = "Логин может состоять только из букв английского алфавита";
					// $err['err_field'] = $reg_login;
				}
	
				if($reg_name === '') {
					$err[] = "Заполните поле никнейм";
					// $err['err_field'] = $reg_name;
				}
	
				if($reg_fullname === '') {
					$err[] = "Заполните поле ФИО";
					// $err['err_field'] = $reg_fullname;
				}
	
				if($reg_login === '') {
					$err[] = "Заполните поле логин";
					// $err['err_field'] = $reg_login;
				}
	
				if($reg_pass === '') {
					$err[] = "Заполните поле пароль";
					// $err['err_field'] = $reg_pass;
				}


				$mysql = new mysqli('127.0.0.1', 'root', 'password', 'mybit');
				if($mysql->connect_errno) {
					echo "Произошла ошибка";
					exit;
				}
				$name = '"' .$mysql->cubrid_real_escape_string($reg_name).'"';
				$fullname = '"' .$mysql->cubrid_real_escape_string($reg_fullname).'"';
				$login = '"' .$mysql->cubrid_real_escape_string($reg_login).'"';
				$pass = '"' .$mysql->cubrid_real_escape_string($reg_pass).'"';
				$birth = '"' .$mysql->cubrid_real_escape_string($reg_birth).'"';
				$gend = '"' .$mysql->cubrid_real_escape_string($reg_gend).'"';
				$mail = '"' .$mysql->cubrid_real_escape_string($reg_mail).'"';
				$phone = '"' .$mysql->cubrid_real_escape_string($reg_phone).'"';

				$query = "INSERT INTO users (user_name, user_fullname, user_login, user_pass, user_birth, user_gend, user_mail, user_phone) VALUES 
				($name, $fullname, $login, $pass', $birth, $gend, $mail, $phone)";

				if(count($err) === 0) {
					$result = $mysql->($query);
					if($result) {
						print('успешно отправили');
					}
					$mysql->close();
				}
			}

			

			// echo '<pre>';
			// var_export($mysql);
			// echo '</pre>';
			// function clear_input($data) { 
			// 	$data = trim($data);
			// 	$data = stripslashes($data);
			// 	$data = htmlspecialchars($data);
			// 	return $data;
			// }

			

			// $reg_name = clear_input($_POST['reg_name']);
			// $reg_fullname = htmlspecialchars($_POST['reg_fullname']);
			// $reg_login = clear_input($_POST['reg_login']);
			// $reg_pass = clear_input($_POST['reg_pass']);
			// $reg_birth = $_POST['reg_birth'];
			// $reg_gend = clear_input($_POST['reg_gend']);
			// $reg_mail = clear_input($_POST['reg_mail']);
			// $reg_phone = clear_input($_POST['reg_phone']);



			
			//проверяем, не сущестует ли пользователя с таким логином
			// $query = mysql_query("SELECT COUNT(user_id) FROM `users` WHERE user_login='".mysql_real_escape_string($reg_login)."'");

			// if(mysql_result($query, 0) > 0){
			// 	$err[] = "Пользователь с таким логином уже существует в базе данных";
			// }

			// Если нет ошибок, то добавляем в БД нового пользователя
			// if(count($err) === 0) {	
			// 	//делаем шифрование для пароля
			// 	//$reg_pass = md5($reg_pass);
			// 	// $str = "INSERT INTO users (user_name, user_fullname, user_login, user_pass, user_birth, user_gend, user_mail, user_phone) VALUES 
			// 	// 	('$reg_name',
			// 	// 	'$reg_fullname',
			// 	//  	'$reg_login',
			// 	// 	'$reg_pass',
			// 	// 	'$reg_birth',  
			// 	// 	$reg_gend,
			// 	// 	'$reg_mail',
			// 	// 	'$reg_phone')
			// 	// ";
			// 	// echo $str;
			// 	$mysql->query("INSERT INTO users (user_name, user_fullname, user_login, user_pass, user_birth, user_gend, user_mail, user_phone) VALUES 
			// 		('$reg_name',
			// 		'$reg_fullname',
			// 	 	'$reg_login',
			// 		'$reg_pass',
			// 		'$reg_birth',  
			// 		$reg_gend,
			// 		'$reg_mail',
			// 		'$reg_phone')
			// 	");
			// }	
			return $err;
			
		}



		// при условии, что будет ещё одна форма с уменьшенным числом инпутов (логина не будет)
		//, где у кнопки отправки будет name="update" 
		public function update()
		{
			if(isset($_POST["update"])) {

				function test_input($data) { // для очищения от лишних символов
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
	
				$err = array();
	
				$up_name = test_input($_POST['up_name']);
				$up_fullname = htmlspecialchars($_POST['up_fullname']);
				// $up_login = test_input($_POST['up_login']);  Андрей сказал, что пользователю не дают править логин
				$up_pass = test_input($_POST['up_pass']);
				$up_birth = $_POST['up_birth'];
				$up_gend = test_input($_POST['up_gend']); 
				$up_mail = test_input($_POST['up_mail']);
				$up_phone = test_input($_POST['up_phone']);
	
	
	
				if(!preg_match("/^[0-9]+$/", $up_pass)) {
					$err[] = "Пароль может состоять только из цифр";
				}
	
				// if(!preg_match("/^[a-zA-Z]+$/", $up_login) {   Андрей сказал, что пользователю не дают править логин
				// 	$err[] = "Логин может состоять только из букв английского алфавита";
				// }
				
				// //проверяем, не сущестует ли пользователя с таким логином
				// $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($reg_login)."'");
	
		

				mysql_query("UPDATE users SET 
					user_name='.$up_name',
					user_fullname='.$up_fullname',
					user_pass='.$up_pass',
					user_birth='.$up_birth',  
					user_gend='.$up_gend',
					user_mail='.$up_mail',
					user_phone='.$up_phone'
				");
			}
		}

	}			
?>