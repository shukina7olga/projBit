<?php 
    include "./../main/header.php";

    $result = $mysql->prepare("SELECT * FROM `posts`"); // выбрали все данные по постах
    $post = $result->fetch_assoc(); // конвертируем данные в массив
    echo $post;

?>


<!-- для динамичного вывода постов в цикле с данными из БД -->
    <div class="post-section">
        <h2 class="header text-center post-h"></h2>
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

<?php include "./../main/footer.php"?>