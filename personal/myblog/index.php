<?php 
    include "./../../main/header.php";
    include './../../main/db.php';
    include './../../main/classes/Post.php';
    session_start();

    $user = new Post;
    $posts = $user->getPost();

    // $arrPost = array(
    //     'id' => [],
    //     'id_user' => [],
    //     'date_create' => [],
    //     'date_update' => [],
    //     'title' => [],
    //     'prev_text' => [],
    //     'detal_text' => []
    // );
    // while ($row = mysqli_fetch_assoc($getPost)) {
    //     $arrPost['id'] = $row['id'];
    //     $arrPost['id_user'] = $row['id_user'];
    //     $arrPost['date_create'] = $row['date_create'];
    //     $arrPost['date_update'] = $row['date_update'];
    //     $arrPost['title'] = $row['title'];
    //     $arrPost['prev_text'] = $row['prev_text'];
    //     $arrPost['detal_text'] = $row['detal_text'];
    // }



    // public function getPost() 
    // {
    //     global $mysql; //глобальная переменная, чтобы не передавать параметр
    //     $getPost = mysqli_query($mysql, "SELECT * FROM `posts`"); // выбрали все данные по постах
        
    //     while ($row = mysqli_fetch_assoc($getPost)) {
    //         $id = $row['id'];
    //         $idUser = $row['id_user'];
    //         $dateCreate = $row['date_create'];
    //         $dateUpdate = $row['date_update'];
    //         $title = $row['title'];
    //         $prevText = $row['prev_text'];
    //         $detalText = $row["detal_text"];
    //         var_dump($row);
    //     }
        
    // }

    
?>
        
    <div>
        <?php foreach($posts as $post): ?>
        <div class="post-section">
            <h2 class="header text-center post-h"><?=$post['title']?></h2>
            <div class="row post-body"> 
                <div class="col-md-3">
                    <img class="img-thumbnail" src="https://www.anypics.ru/download.php?file=201210/2560x1440/anypics.ru-9284.jpg" alt="">            
                </div>
                <div class="col-md-9">
                    <p class="lh-sm text-start post-text"><?=$post['prev_text']?></p>
                    <div class="row" >
                        <p class="col text-muted">имя пользователя <?=$post['id_user']?></p>
                        <p class="col text-muted">дата создания <?=$post['date_create']?></p>
                        <!-- <button class="col btn btn-outline-secondary">Редактировать</button>    -->
                    </div>
                </div>       
            </div>        
        </div>   
        <?php endforeach; ?>
    </div>

    <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a>

    <script src="./../../assets/js/togglepost.js"></script>
    
    


<?php include "./../../main/footer.php"?>