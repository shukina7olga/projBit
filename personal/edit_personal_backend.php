<?php 
    include './../main/db.php'; 
    include './../main/classes/User.php';
    
    $user = new User;

    $edit_err = $user->update();
   
    $arr = array(
        'status' => 'error',
        'message' => '',
        'err_message' => ''
    ); 

   
    if(empty($edit_err)) {         
        $arr['status'] = 'success';
        $arr['message'] = 'изменения внесены';
        $arr['err_message'] = $edit_err;

    } else {
        $arr['status'] = 'error';
    }


    echo $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $mysql->close();

  
?> 