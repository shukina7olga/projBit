<?php 
    include "./../main/header.php";
    $get_arr = getData();   
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 text-center">
    <div class="col mb-5">
        <h2 class="header">Заголовок1</h2>
        <p class="lh-sm text-start">Текст-рыба на русском языке. Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым.
             Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста.</p>
        <img class="img-thumbnail" src="https://funik.ru/wp-content/uploads/2018/10/17478da42271207e1d86.jpg" alt="">
        <div class="row">
            <p class="col text-muted">имя пользователя<?= $get_arr['ses_name'] ?></p>
            <p class="col text-muted">дата создания</p>
        </div>
        <button class="btn btn-sm btn-secondary">Редактировать</button>    
    </div>
    <div class="col mb-5">
        <h2 class="header">Заголовок2</h2>
        <p class="lh-sm text-start">текст поста текст поста</p>
        <div class="row">
            <p class="col text-muted">имя пользователя<?= $get_arr['ses_name'] ?></p>
            <p class="col text-muted">дата создания</p>
        </div>
        <button class="btn btn-sm btn-secondary">Редактировать</button>    
    </div>
    <div class="col">
        <h2 class="header">Заголовок3</h2>
        <p class="lh-sm text-start">текст поста текст поста</p>
        <img class="img-thumbnail" src="https://telegrator.ru/wp-content/uploads/2021/05/chat_avatar-136.jpg" alt="">
        <div class="row">
            <p class="col text-muted">имя пользователя<?= $get_arr['ses_name'] ?></p>
            <p class="col text-muted">дата создания</p>
        </div>
        <button class="btn btn-sm btn-secondary">Редактировать</button>    
    </div>

</div>

<?php include "./../main/footer.php"?>