<?php 
    session_start();

    if(!isAuth()) {
        header('Location: /auth.php');
    }

    $ses_fullName = $_SESSION['user']['user_fullName'];

?>

<?php include "./main/header.php"?>

    <div class='fault'>
        <h2>Добро пожаловать <?=$ses_fullName?></h2>
        <a class='fault-btn' href='/logout.php'>Выйти</a>
        <a class='fault-btn' href='/personal.php'>Информация</a>
    </div>

<?php include "./main/footer.php"?>


