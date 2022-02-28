/*Таблица пользователей users*/
create table users
(
 /*user_id - первичный ключ, целое число с 
автоинкрементом (+1), который никогда не будет равен нулю*/
 user_id int NOT NULL auto_increment primary key,
 user_name varchar(20) NOT NULL, /*имя */
 user_fullName varchar(50) NOT NULL, /*фио */
 user_login varchar(20) NOT NULL, /*логин*/
 user_pass int(10) NOT NULL /*пароль*/
);