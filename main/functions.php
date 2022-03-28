<?php
    // в методе isAuth
    // функция проверки авторизации пользователем
    // function isAuth() {
    //     return isset($_SESSION['user']);
    // }


    // в методе класса User
    // запись данных о пользователе в сессию
    // function setData($user) {     
    //     $ses_arr = array(
    //         'user_id' => $user['user_id'],
    //         'user_name' => $user['user_name'],
    //         'user_fullName' => $user['user_fullName'],
    //         'user_login' => $user['user_login'],
    //         'user_pass' => $user['user_pass'],
    //         'user_birth' => $user['user_birth'],
    //         'user_gend' => (int)$user['user_gend'],
    //         'user_mail' => $user['user_mail'],
    //         'user_phone' => $user['user_phone']
    //     );
    //     $_SESSION['user'] = $ses_arr;
    //     return $_SESSION['user'];
    // }

    // в методе getData в классе User 
    // function getData() {
    //     $ses_id = htmlspecialchars($_SESSION['user']['user_id']);         
    //     $ses_name = htmlspecialchars($_SESSION['user']['user_name']);
    //     $ses_fullName = htmlspecialchars($_SESSION['user']['user_fullName']);

    //     $ses_login = htmlspecialchars($_SESSION['user']['user_login']);
    //     $ses_pass = htmlspecialchars($_SESSION['user']['user_pass']);

    //     $bDate = new DateTime($_SESSION['user']['user_birth'], new DateTimeZone('Europe/Moscow')); // указываем часовой пояс
    //     $ses_birth = $bDate->format("d.m.Y"); // сделать вывод даты без времени

    //     $ses_mail = htmlspecialchars($_SESSION['user']['user_mail']);
    //     $ses_phone = htmlspecialchars($_SESSION['user']['user_phone']);
    //     if($_SESSION['user']['user_gend'] === 1) {
    //         $ses_gend = 'мужчина';
    //     } else {
    //         $ses_gend = 'женщина';
    //     }

    //     $get_arr = array(
    //         'ses_id' => $ses_id,
    //         'ses_name' => $ses_name,
    //         'ses_fullName' => $ses_fullName,
    //         'ses_login' => $ses_login,
    //         'ses_pass' => $ses_pass,
    //         'ses_birth' => $ses_birth,
    //         'ses_mail' => $ses_mail,
    //         'ses_phone' => $ses_phone,
    //         'ses_gend' => $ses_gend
    //     );

    //     return $get_arr;
        
    // }
?>