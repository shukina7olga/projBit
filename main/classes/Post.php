<?php
	class Post 
	{
		public function getPost($mysql) 
		{
			$result = $mysql->prepare("SELECT * FROM `posts`"); // выбрали все данные по постах
			$post = $result->fetch_assoc(); // конвертируем данные в массив
			return $post;
		}

		public function addPost() 
		{
			
		}
	}

?>


<!-- пост надо получать по id? пост в сессии? -->