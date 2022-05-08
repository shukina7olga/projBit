<?php
	class Post 
	{
		// для очищения от лишних символов
		public function test_input($data) 
		{ 
			$data = stripslashes($data);
			$data = htmlspecialchars($data);   
			return $data;
		}

		public function getPost() 
		{
			global $mysql; //глобальная переменная, чтобы не передавать параметр
			$getPost = mysqli_query($mysql, "SELECT * FROM `posts`"); // выбрали все данные по постах
			$posts = mysqli_fetch_all($getPost, MYSQLI_ASSOC);
			return $posts;
		}

		public function addPost() 
		{
			global $mysql;
			$id_user = $_SESSION['user']['user_id']; 
			$title = $this->test_input($_POST['title']);
			$prev_text = $this->test_input($_POST['prev_text']);
			$detal_text = $this->test_input($_POST['detal_text']);
			$img = $_POST['img'];

			$query = mysqli_query($mysql, "INSERT INTO `posts` (`id_user`, `title`, `prev_text`, `detal_text`, `img`) VALUES 
				('{$id_user}', '{$title}', '{$prev_text}', '{$detal_text}', '{$img}')");
			if ($query) {
				// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
			} else {
				echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
			} 

		}
	}

?>
