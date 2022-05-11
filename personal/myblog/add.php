<?php 
    include "./../../main/header.php";
?>
        
    <form  class="form"  name="" method="post" id="formPost">
        <h2>Добавление поста</h2>
        <label class="form-label form-label-post">Заголовок
            <input class="form-input" type="text" name="title"> <!-- расширит в длину поле при вводе текста onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';"-->
        </label>
        <label class="form-label form-label-post">Краткое содержание
            <textarea class="form-input" type="text" name="prev_text"></textarea>
        </label>
        <label class="form-label form-label-post">Основное содержание
            <textarea class="form-input" type="text" name="detal_text"></textarea>
        </label>
        <label class="form-label">Изображение
            <input class="form-input" type="file" name="img">
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>

    <a class='btn btn-outline-secondary' href='./../../private.php'>Назад</a>

    <script src="./../../assets/js/ajax_post.js"></script>

<?php include "./../../main/footer.php"?>