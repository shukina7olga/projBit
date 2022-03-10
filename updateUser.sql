update users
    set user_birth = '1999-11-11',
        user_gend = 1,
        user_mail = '121@mail.ru',
        user_phone = '89251111111'
    where user_id = 1;

update users
    set user_birth = '1998-12-01',
        user_gend = 0,
        user_mail = '222@mail.ru',
        user_phone = '89252222222'
    where user_id = 2;

update users
    set user_birth = '1999-08-22',
        user_gend = 1,
        user_mail = '333@mail.ru',
        user_phone = '89253333333'
    where user_id = 3;

