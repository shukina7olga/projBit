<?php
    include "./../main/header.php";
    include './../main/classes/User.php';
 
    $user = new User;
    $user-> isAuth();
    $get_arr = $user-> getData();
    
?>

    <h1>Информация об аккаунте</h1>
    <div>
        <p>Никнейм пользователя: <?= $get_arr['ses_name'] ?></p>
        <p>Полное имя: <?= $get_arr['ses_fullName'] ?></p>
        <p>Дата рождения: <?= $get_arr['ses_birth'] ?></p>
        <p>Пол: <?= $get_arr['ses_gend'] ?></p>
        <p>Почта: <?= $get_arr['ses_mail'] ?></p>
        <p>Телефон: <?= $get_arr['ses_phone'] ?></p>
    </div>
    <a class='btn btn-outline-secondary' href='/private.php'>Назад</a>
    <a class='btn btn-outline-secondary' href='/logout.php'>Выйти</a>
    <a class='btn btn-outline-secondary' href='/personal/edit_personal.php?edit=<?= $_SESSION['user']['user_id']?>'>Редактировать</a>
<?php include "./main/footer.php"?>
