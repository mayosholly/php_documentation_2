DROP DATABASE php_class_test;
create database php_class_test;
use php_class_test;
create table products(
    id int auto_increment primary key,
    name varchar(255),
    description varchar(255),
    price decimal(10,2),
    created_at timestamp default now()
);
insert into products(name, description, price)
values ('pizza', 'a pizza', 100),
('bread', 'a bread', 200)
