<?php
    session_start();
    
    $get_arr = getData();
    
    if(!isAuth()) {
        header('Location: /auth.php');
    }
    
?>


<?php include "./main/header.php"?>

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
