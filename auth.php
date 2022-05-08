<?php   
    include "./main/header.php";
    include './main/classes/User.php';
    
    $user = new User;
    $user-> isAuth();

?>
    
    <form  class="form"  name="authf" method="post" id="formAj">
        <h2>Форма авторизации</h2>
        <label class="form-label">Логин
            <input class="form-input" type="text" name="login" id="loginId">
        </label>
        <label class="form-label">Пароль
            <input class="form-input" type="password" name="pass" id="passId">
        </label>
        <p><input type="submit" class="btn btn-outline-secondary"/></p>
    </form>
    <a href="./../register.php">Зарегистрироваться</a>
    <script src="./../assets/js/ajax.js"></script>

<?php include "./main/footer.php"?>

  





