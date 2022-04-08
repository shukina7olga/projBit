<?php 
    include "./../../main/header.php";
?>
        
    <form  class="form"  name="" method="post" id="formAj">
        <h2>Добавление поста</h2>
        <label class="form-label">Заголовок
            <input class="form-input" type="text" name="title" 
            onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';"> <!-- расширит в длину поле при вводе текста -->
        </label>
        <label class="form-label">Краткое содержание
            <textarea class="form-input" type="text" name="prevTitle"></textarea>
        </label>
        <label class="form-label">Основное содержание
            <textarea class="form-input" type="text" name="detalTitle"></textarea>
        </label>
        <label class="form-label">Изображение
            <input class="form-input" type="file" name="img">
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>
    

<?php include "./../../main/footer.php"?>