<?php   
    include "./main/header.php";

?>
    
    <form  class="form"  name="register" method="post" id="formReg">
        <h2>Форма регистрации</h2>
        
        <label class="form-label">Логин
            <input class="form-input" type="text" name="login">
        </label>
        <label class="form-label">Пароль
            <input class="form-input" type="password" name="pass">
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>
    <script src="./../assets/js/ajax.js"></script>

<?php include "./main/footer.php"?>