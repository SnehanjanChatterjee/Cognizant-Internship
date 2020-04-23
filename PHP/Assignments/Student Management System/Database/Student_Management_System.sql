create database student_management_system;

use student_management_system;

create table users (
id INT AUTO_INCREMENT,
userid varchar(13),
user_role INT,
password varchar(20),
last_login TIMESTAMP,
status INT,
constraint pk_users primary key(id)
);

create table user_values (
id INT,
fname varchar(20), 
lname varchar(20),
email varchar(20),
class varchar(10),
section varchar(10),
address varchar(100),
mobile_no INT,
password varchar(20),
constraint pk_user_values primary key(email,mobile_no),
constraint fk_user_values_id foreign key(id) references users(id)
);

create table class (
class_id INT AUTO_INCREMENT,
class_no INT,
constraint pk_class primary key(class_id)
);

insert into class(class_no) values (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12);

create table class_section (
class_section_id INT AUTO_INCREMENT,
class_id INT,
class_no INT,
section varchar(10),
constraint pk_class primary key(class_section_id),
constraint fk_class_section foreign key(class_id) references class(class_id)
);

insert into class_section(class_id,class_no,section)  values 
(1,1,'A'),(1,1,'B'),(1,1,'C'),
(2,2,'A'),(2,2,'B'),(2,2,'C'),(2,2,'D'),
(3,3,'A'),(3,3,'B'),(3,3,'C'),
(4,4,'A'),(4,4,'B'),
(5,5,'A'),(5,5,'B'),(5,5,'C'),(5,5,'D'),(5,5,'E'),
(6,6,'A'),(6,6,'B'),
(7,7,'A'),(7,7,'B'),(7,7,'C'),(7,7,'D'),
(8,8,'A'),(8,8,'B'),(8,8,'C'),
(9,9,'A'),(9,9,'B'),(9,9,'C'),(9,9,'D'),
(10,10,'A'),(10,10,'B'),(10,10,'C'),(10,10,'D'),(10,10,'E'),
(11,11,'A'),(11,11,'B'),(11,11,'C'),
(12,12,'A'),(12,12,'B'),(12,12,'C');

alter table users add passwordWithoutEncryption varchar(100) after password;

alter table user_values add passwordWithoutEncryption varchar(100) after password;