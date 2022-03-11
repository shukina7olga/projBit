<?php
    // функция проверки авторизации пользователем
    function isAuth() {
        return isset($_SESSION['user']);
    }

    
    function getData($user) {     
        $ses_arr = array(
            'user_id' => $user['user_id'],
            'user_name' => $user['user_name'],
            'user_fullName' => $user['user_fullName'],
            'user_login' => $user['user_login'],
            'user_pass' => $user['user_pass'],
            'user_birth' => $user['user_birth'],
            'user_gend' => (int)$user['user_gend'],
            'user_mail' => $user['user_mail'],
            'user_phone' => $user['user_phone']
        );
        $_SESSION['user'] = $ses_arr;
        return $_SESSION['user'];
    }
?>