<?php 
    include "./main/header.php";
    
    if(!isAuth()) {
        header('Location: /auth.php');
    }

    $ses_fullName = $_SESSION['user']['user_fullName'];

?>

    <div class='fault'>
        <h2>Добро пожаловать <?=$ses_fullName?></h2>
        <a class='fault-btn' href='/logout.php'>Выйти</a>
        <a class='fault-btn' href='/personal/index.php'>Информация</a>
    </div>

<?php include "./main/footer.php"?>


