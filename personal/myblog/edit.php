<?php 
    include "./../../main/header.php";
    include './../../main/db.php';
    include './../../main/classes/Post.php';

    // чтобы при редактировании в полях был текст, который будем менять
    $user = new Post;
    $post = $user->watchEdited();

?>
        
    <form  class="form" action="editpost_backend.php"  name="" method="post" id="formPostEdit">
        <h2>Редактирование поста</h2>
        <input type="hidden" name='id' value=<?=$post[0]['id']?>>
        <label class="form-label form-label-post">Заголовок
            <input class="form-input" type="text" name="title" value=<?=$post[0]['title']?>> <!-- расширит в длину поле при вводе текста onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';"-->
        </label>
        <label class="form-label form-label-post">Краткое содержание
            <textarea class="form-input" type="text" name="prev_text"><?=$post[0]['prev_text']?></textarea>
        </label>
        <label class="form-label form-label-post">Основное содержание
            <textarea class="form-input" type="text" name="detal_text"><?=$post[0]['detal_text']?></textarea>
        </label>
        <label class="form-label">Изображение
            <input class="form-input" type="file" name="img" value=<?=$post[0]['img']?>>
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>

    <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a>

    <script src="./../../assets/js/ajax_edit_post.js"></script>

<?php include "./../../main/footer.php"?>