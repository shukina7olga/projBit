/*Таблица пользователей users*/
create table posts
(
    /*user_id - первичный ключ, целое число с 
    автоинкрементом (+1), который никогда не будет равен нулю*/
    id int NOT NULL auto_increment primary key,
    id_user varchar(255) NOT NULL, /*имя пользователя*/
    date_create timestamp default now() NOT NULL, /*дата создания */
    title varchar(255) NOT NULL, /*заголовок*/
    prev_text varchar(255) NOT NULL, /*видимый краткий текст*/
    detal_text varchar(255) NOT NULL, /*спрятанный весь текст*/
    img varchar(255) /*картинка к посту*/
);