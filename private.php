<?php 
    include "./main/header.php";
    include './main/classes/User.php';
    
    $user = new User;
    $user-> isAuth();

    $ses_fullName = $_SESSION['user']['user_fullName'];

?>

    <div class='form'>
        <h2>Добро пожаловать <?=$ses_fullName?></h2>
        <div class="btn-wrap">
            <a class='btn btn-outline-secondary' href='/logout.php'>Выйти</a>
            <a class='btn btn-outline-secondary' href='/personal/index.php'>Информация</a>
            <a class='btn btn-outline-secondary' href='/personal/myblog/add.php'>Добавить пост</a>
            <a class='btn btn-outline-secondary' href='/personal/myblog/index.php'>Мои посты</a>
        </div>
    </div>

<?php include "./main/footer.php"?>


