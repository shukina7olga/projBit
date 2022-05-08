<?php 
    include "./../../main/header.php";
    include './../../main/db.php';
    include './../../main/classes/Post.php';
    session_start();

    $user = new Post;
    $arr = $user->getPost();


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


    
?>
        
    <div>
        <div class="post-section">
            <h2 class="header text-center post-h">Заголовок1</h2>
            <div class="row post-body"> 
                <div class="col-md-3">
                    <img class="img-thumbnail" src="https://www.anypics.ru/download.php?file=201210/2560x1440/anypics.ru-9284.jpg" alt="">            
                </div>
                <div class="col-md-9">
                    <p class="lh-sm text-start post-text">Текст-рыба на русском языке. Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым.
                        Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста.</p>
                    <div class="row" >
                        <p class="col text-muted">имя пользователя</p>
                        <p class="col text-muted">дата создания</p>
                        <!-- <button class="col btn btn-outline-secondary">Редактировать</button>    -->
                    </div>
                </div>       
            </div>        
        </div>    

        <div class="post-section">
            <h2 class="header text-center post-h">Заголовок2</h2>
            <div class="row post-body"> 
                <div class="col-md-3">
                </div>
                <div class="col-md-9">  
                    <p class="lh-sm text-start post-text">Текст-рыба на русском языке. Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым.
                        Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста.</p>
                    <div class="row">
                        <p class="col text-muted">имя пользователя</p>
                        <p class="col text-muted">дата создания</p>
                        <!-- <button class="col btn btn-outline-secondary">Редактировать</button>    -->
                    </div>
                </div>       
            </div>
        </div>
    </div>

    <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a>

    <script src="./../../assets/js/togglepost.js"></script>
    
    


<?php include "./../../main/footer.php"?>