<?php 
    include "./../main/header.php";
    include './../main/db.php';
    include './../main/classes/User.php';


    $user = new User;
    $inform = $user->watchEditedUser();

    // в поле должны быть только числа, а в нам из бд приходит строка типа +7(576)
    $str = $inform[0]['user_phone'];
    $pattern = '/[^0-9]/'; 

    
    
?>
    
    <form  class="form" action="edit_personal_backend.php" name="registerEdit" method="post" id="regEditForm">
        <h2>Редактирование данных</h2>
        
        <label class="form-label">Никнейм
            <input class="form-input" type="text" name="reg_name" value=<?=$inform[0]['user_name']?>>
        </label>
        <label class="form-label">ФИО
            <input class="form-input" type="text" name="reg_fullname" value=<?=$inform[0]['user_fullName']?>>
        </label>

        <label class="form-label">Старый пароль
            <input class="form-input" type="password" name="old_pass">
        </label>

        <label class="form-label">Новый пароль
            <input class="form-input" type="password" name="new_pass">
        </label>

        <label class="form-label">Подтверждение пароля
            <input class="form-input" type="password" name="new_check_pass">
        </label>

        <label class="form-label">Дата рождения
            <input class="form-input" type="date" name="reg_birth" value=<?=$inform[0]['user_birth']?>>
        </label>
        <label class="form-label">Пол
            <select class="form-input" type="text" name="reg_gend">
                <?php
                    if($inform[0]['user_gend'] == "0") {
                        echo "<option value='0'>женский</option>";
                        ?><option value='1'>мужской</option><?php
                    } else {
                        echo "<option value='1'>мужской</option>";
                        ?><option value='0'>женский</option><?php
                    }
                ?>
                
            </select>
        </label>
        <label class="form-label">Почта
            <input class="form-input" type="email" name="reg_mail" value=<?=$inform[0]['user_mail']?>>
        </label>
        <label class="form-label">Телефон
            <input class="form-input" type="tel" name="reg_phone" data-phone-pattern = "+7 (___) ___-__-__"
            value=<?=preg_replace($pattern, "", $str)?>>
        </label>
        <div class="group_btn">
            <a class='btn btn-outline-secondary' href='/personal/edit_personal.php?edit=<?= $_SESSION['user']['user_id']?>?save'>          
                Сохранить
            </a>
            <input type="submit" class="btn btn-outline-secondary" value="Применить"/>
            <a class='btn btn-outline-secondary' href='/personal/edit_personal.php?edit=<?= $_SESSION['user']['user_id']?>'>          
                Отменить
            </a>
        </div>
        
    </form>

    <a class='btn btn-outline-secondary' href='/personal/index.php'>Назад</a>

    <script src="./../assets/js/ajax_edit_register.js"></script>
    <script src="./../assets/js/mask.js"></script>


<?php include "./../main/footer.php" ?>