<?php
    session_start();
    include './main/classes/User.php';
    
    $user = new User;
    $user-> logout();

?>