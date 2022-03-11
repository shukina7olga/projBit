<?php
    include './main/header.php';
    session_start();
    
    if(isAuth()) {
        header('Location: /private.php');
    }

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projBit</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

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
</body>
</html>




