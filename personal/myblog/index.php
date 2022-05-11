<?php 
    include "./../../main/header.php";
    include './../../main/db.php';
    include './../../main/classes/Post.php';

    $user = new Post;
    $posts = $user->getPersonalPost(); 

?>
        
    <div>
        <?php foreach($posts as $post): ?>
        <div class="post-section">
            <h2 class="header text-center post-h"><?=$post['title']?></h2>
            <div class="row post-body"> 
                <div class="col-md-4">
                    <img class="img-post" src=<?=$post['img']?> alt="">             
                </div>
                <div class="col-md-8">
                    <p class="lh-sm text-start post-text"><?=$post['prev_text']?></p>
                    <div class="row" >
                        <!-- <p class="col text-muted">имя пользователя <?=$post['id_user']?></p> -->
                        <p class="col text-muted">дата создания <?=$post['date_create']?></p>
                    </div>
                    <a class='btn btn-outline-secondary' href='./edit.php'>Редактировать</a>  
                </div>       
            </div>        
        </div>   
        <?php endforeach; ?>
    </div>

    <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a>

    <script src="./../../assets/js/togglepost.js"></script>
    
    


<?php include "./../../main/footer.php"?>