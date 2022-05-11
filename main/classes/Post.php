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

		// получаем вообще все посты
		public function getPost()  
		{
			global $mysql; //глобальная переменная, чтобы не передавать параметр в скобках
			$getPost = mysqli_query($mysql, "SELECT * FROM `posts`"); // выбрали все данные по постах
			$posts = mysqli_fetch_all($getPost, MYSQLI_ASSOC);
			return $posts;
		}

		// получаем все посты для конкретного пользователя
		public function getPersonalPost()  
		{
			global $mysql;
			$id_user = $_SESSION['user']['user_id']; 
			$user_post = mysqli_query($mysql, "SELECT * FROM `posts` WHERE id_user = '{$id_user}'");
			$posts = mysqli_fetch_all($user_post, MYSQLI_ASSOC);
			return $posts;
		}

		public function addPost() 
		{
			global $mysql;
			$id_user = $_SESSION['user']['user_id']; 
			$title = $this->test_input($_POST['title']);
			$prev_text = $this->test_input($_POST['prev_text']);
			$detal_text = $this->test_input($_POST['detal_text']);
			$img = $_FILES['img'];
			$imgName = $img['name'];
			$pathImg = 'C:/OSPanelLight/domains/studyBit/personal/blogImg/'.$imgName;
			move_uploaded_file($img['tmp_name'], $pathImg);

			$query = mysqli_query($mysql, "INSERT INTO `posts` (`id_user`, `title`, `prev_text`, `detal_text`, `img`) VALUES 
				('{$id_user}', '{$title}', '{$prev_text}', '{$detal_text}', '{$pathImg}')");
			if ($query) {
				// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
			} else {
				echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
			} 

		}


		public function updatePost() 
		{
			global $mysql;
			$id_user = $_SESSION['user']['user_id']; 
			$title = $this->test_input($_POST['title']);
			$prev_text = $this->test_input($_POST['prev_text']);
			$detal_text = $this->test_input($_POST['detal_text']);
			$img = $_FILES['img'];
			$imgName = $img['name'];
			$pathImg = 'C:/OSPanelLight/domains/studyBit/personal/blogImg/'.$imgName;
			move_uploaded_file($img['tmp_name'], $pathImg);

			$query = mysqli_query($mysql, "UPDATE `posts` SET id_user='$id_user', title='$title',
			 prev_text='$prev_text', detal_text='$detal_text', detal_text='$detal_text', img='$pathImg' ");
			if ($query) {
				// echo '<p>Данные успешно добавлены в таблицу<p>'; С ЭТОЙ СТРОЧКОЙ НЕ ПАРСИТ. ПРИ ПАРСИНГЕ НАЧИНАЕТ ПИХАТЬ ЭТУ СТРОКУ
			} else {
				echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
			} 
			
		}


		public function deletePost() 
		{

		}


	}

?>
