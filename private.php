<?php 
    session_start();

    if(!$_SESSION['user']) {
        header('Location: /auth.php');
    }

    $ses_fullName = $_SESSION['user']['user_fullName'];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projBit</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class='fault'>
        <h2>Добро пожаловать <?=$ses_fullName?></h2>
        <a class='fault-btn' href='/logout.php'>Выйти</a>
    </div>

 
</body>
</html>


