<?php   
    include "./main/header.php";
?>
    
    <form  class="form"  name="register" method="post" id="regForm">
        <h2>Форма регистрации</h2>
        
        <label class="form-label">Никнейм
            <input class="form-input" type="text" name="reg_name">
        </label>
        <label class="form-label">ФИО
            <input class="form-input" type="text" name="reg_fullname">
        </label>
        <label class="form-label">Логин
            <input class="form-input" type="text" name="reg_login">
        </label>
        <label class="form-label">Пароль
            <input class="form-input" type="password" name="reg_pass">
        </label>
        <label class="form-label">Дата рождения
            <input class="form-input" type="date" name="reg_birth">
        </label>
        <label class="form-label">Пол
            <input class="form-input" type="text" name="reg_gend">
        </label>
        <label class="form-label">Почта
            <input class="form-input" type="email" name="reg_mail">
        </label>
        <label class="form-label">Телефон
            <input class="form-input" type="tel" name="reg_phone">
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>
    <script src="./../assets/js/ajax.js"></script>

<?php include "./main/footer.php"?>