<?php  
    session_start();
    
    include "./main/header.php";

    if(isAuth()) {
        header('Location: /private.php');
    } 

?>
    
    <form  class="form"  name="authf" method="post" id="formAj">
        <h2>Форма авторизации</h2>
        <label class="form-label">Логин
            <input class="form-input" type="text" name="login" id="loginId">
        </label>
        <label class="form-label">Пароль
            <input class="form-input" type="password" name="pass" id="passId">
        </label>
        <p><input type="submit" class="form-btn"/></p>
    </form>
    <script src="ajax.js"></script>

<?php include "./main/footer.php"?>

  





