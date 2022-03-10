<?php
    session_start();

    $_SESSION = [];

    header('Location: /auth.php');

    session_destroy();

?>