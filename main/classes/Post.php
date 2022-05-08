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
			
			while ($row = mysqli_fetch_assoc($getPost)) {
				$id = $row['id'];
				$idUser = $row['id_user'];
				$dateCreate = $row['date_create'];
				$dateUpdate = $row['date_update'];
				$title = $row['title'];
				$prevText = $row['prev_text'];
				$detalText = $row["detal_text"];
				var_dump($row);
			}
			
		}

		public function addPost($mysql) 
		{
			$id = $_SESSION['user']['user_id']; 
			$title = $this->test_input($_POST['title']);
			$prevText = $this->test_input($_POST['prevText']);
			$detalText = $this->test_input($_POST['detalText']);
			$img = $_POST['img'];

			$query = mysqli_query($mysql, "INSERT INTO `posts` (`id_user`, `title`, `prev_text`, `detal_text`, `img`) VALUES 
				('{$id}', '{$title}', '{$prevTitle}', '{$detalTitle}', '{$img}')");
			if ($query) {
				// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
			} else {
				echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
			} 

		}
	}

?>
