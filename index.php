<?php 
    include "./main/header.php";
    include './main/db.php';
    include './main/classes/Post.php';

    // выводим все все посты
    $user = new Post;
    $posts = $user->getPost();
?>

    <h2 class="display-6 text-center">Посты всех пользователей</h2>
    <!-- 
    <p class="lead text-center">Приветствуем проявивших желание работать в компании Первый Бит.
            На данном сайте будут представлены актуальные марериалы для обучения.</p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 text-center">
        <div class="card-body shadow-sm">
            <h5 class="card-title">Информация для стажёров</h5>
            <p class="card-text">Структура компании, учебный план, курсы.</p>
            <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
        </div>
        <div class="card-body shadow-sm">
            <h5 class="card-title">Информация для студентов</h5>
            <p class="card-text">Как подготовиться к стажировке.</p>
            <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
        </div>
    </div> -->

    <div>
        <?php foreach($posts as $post):?>
        <div class="post-section">
            <h2 class="header text-center post-h"><?=$post['title']?></h2>
            <div class="row post-body">
                
            <?php 
                $img = $post['img'];
                $imgpath = pathinfo($img);
                if($imgpath['extension'] != NULL) { 
            ?>

                <div class="col-md-4 p-3">
                    <img class="img-post" src=<?=$post['img']?> alt="">            
                </div>
                <div class="col-md-8">
                    <div class="row" >
                        <p class="col text-muted">имя пользователя 
                            <?php
                                $id_user = $post['id_user'];
                                $user_name = mysqli_query($mysql, "SELECT user_name FROM `users` WHERE user_id = '{$id_user}'");
                                $user_namebd = mysqli_fetch_assoc($user_name);
                                echo $user_namebd['user_name'];
                            ?>
                        </p>
                        <p class="col text-muted">дата создания <?=$post['date_create']?></p>
                        <p class="lh-sm text-start post-text"><?=$post['prev_text']?></p>
                    </div>
                </div>
                
            <?php } else { ?>  
                
                <div class="col-md-12 p-3">
                    <div class="row" >
                        <p class="col text-muted">имя пользователя 
                            <?php
                                $id_user = $post['id_user'];
                                $user_name = mysqli_query($mysql, "SELECT user_name FROM `users` WHERE user_id = '{$id_user}'");
                                $user_namebd = mysqli_fetch_assoc($user_name);
                                echo $user_namebd['user_name'];
                            ?>
                        </p>
                        <p class="col text-muted">дата создания <?=$post['date_create']?></p>
                        <p class="lh-sm text-start post-text"><?=$post['prev_text']?></p>
                    </div>
                </div>

            <?php }; ?>
                
            </div>        
        </div>   
        <?php endforeach; ?>
    </div>

    <!-- <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a> -->

    <script src="./../../assets/js/togglepost.js"></script>

<?php include "./main/footer.php"?>
    