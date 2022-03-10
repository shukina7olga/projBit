<?php
    session_start();
    
    $ses_name = $_SESSION['user']['user_name'];
    $ses_fullName = $_SESSION['user']['user_fullName'];
    $bDate = new DateTime($_SESSION['user']['user_birth'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
    $ses_birth = $bDate->format("d.m.Y"); // сделать вывод даты без времени
    $ses_mail = $_SESSION['user']['user_mail'];
    $ses_phone = $_SESSION['user']['user_phone'];
    if($_SESSION['user']['user_gend'] === 1) {
        $ses_gend = 'мужчина';
    } else {
        $ses_gend = 'женщина';
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
        <p>Имя пользователя: <?= $ses_name ?></p>
        <p>Полное имя: <?= $ses_fullName ?></p>
        <p>Дата рождения: <?= $ses_birth ?></p>
        <p>Пол: <?= $ses_gend ?></p>
        <p>Почта: <?= $ses_mail ?></p>
        <p>Телефон: <?= $ses_phone ?></p>
    </div>
    <a class='fault-btn' href='/private.php'>Назад</a>
    <a class='fault-btn' href='/logout.php'>Выйти</a>
</body>
</html>