use php_blog;

create table signup(
id int PRIMARY key AUTO_INCREMENT,
    name varchar(150),
    email varchar(150),
    password varchar(150)
);

CREATE TABLE customer(
id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(200) UNIQUE,
    name varchar(200),
    is_active boolean DEFAULT false,    
	image_path text
)