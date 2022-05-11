<?php
    include './../../main/db.php';
    include './../../main/classes/Post.php';

    session_start();

    // $user = new Post;
    // $user->updatePost();

    var_dump($_GET['id']);

    $arr = array(
        'status' => 'error',
        'message' => ''
    ); 

    if (!empty($_POST)) {         
        $arr['status'] = 'success';
    } else {
        $arr['status'] = 'error';
    }


    echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $mysql->close();
?>