<?php
    include './main/header.php';
    session_start();
    
    $get_arr = getData();
    
    if(!isAuth()) {
        header('Location: /auth.php');
    }
    
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация об аккаунте</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Информация об аккаунте</h1>
    <div>
        <p>Никнейм пользователя: <?= $get_arr['ses_name'] ?></p>
        <p>Полное имя: <?= $get_arr['ses_fullName'] ?></p>
        <p>Дата рождения: <?= $get_arr['ses_birth'] ?></p>
        <p>Пол: <?= $get_arr['ses_gend'] ?></p>
        <p>Почта: <?= $get_arr['ses_mail'] ?></p>
        <p>Телефон: <?= $get_arr['ses_phone'] ?></p>
    </div>
    <a class='fault-btn' href='/private.php'>Назад</a>
    <a class='fault-btn' href='/logout.php'>Выйти</a>

    <?php include "./main/footer.php"?>
</body>
</html>