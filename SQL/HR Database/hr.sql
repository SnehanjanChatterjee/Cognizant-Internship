create database hr;

-- show databases;

use hr;

create table regions (
region_id INT,
region_name varchar(25),
constraint pk_regions primary key(region_id)
);

-- desc regions;

insert into regions values (107,'Nairobi'),(201,'Rio'),(302,'Tokyo'),(406,'Moscow'),(504,'Oslo');

-- select * from regions;

create table countries (
country_id char(2),
country_name varchar(40),
region_id INT,
constraint pk_countires primary key(country_id),
constraint fk_countires_region_id foreign key(region_id) references regions(region_id)
);

-- desc countries;

insert into countries values ('01','Kenya',107),('02','Brazil',201),('03','Japan',302),('04','Russia',406),('05','Norway',504);

-- select * from countries;

create table locations (
location_id INT(4),
street_address varchar(40),
postal_code varchar(12),
city varchar(30) NOT NULL,
state_province varchar(25),
country_id char(2),
constraint pk_locations primary key(location_id),
constraint fk_locations_region_id foreign key(country_id) references countries(country_id)
);

-- desc locations;

insert into locations values (1001, '5th Floor NHIF Building Ragati Road', '34670', 'Nairobi', 'Nairobi', '01'),
(1002, '17, R. Greenalgh', '20251-28', 'Catumbi', 'Rio', '02'),
(1003, '3 Chome-4-417 Shirokanedai', '108-0071', 'Kantō', 'Tokyo', '03'),
(1004, 'Presnenskaya Naberezhnaya, 10', '123317', 'Central', 'Moscow', '04'),
(1005, 'Karoline Kristiansens vei 1', '0661', 'Østlandet', 'Oslo', '05');

-- select * from locations;

create table jobs (
job_id varchar(10),
job_title varchar(35) NOT NULL,
min_salary INT(6),
max_salary INT(6),
constraint pk_jobs primary key(job_id)
);

-- desc from jobs;

insert into jobs values ('100','Developer','20000','30000'),('101','Senior Developer','50000','80000'),('102','Team Manager','100000','150000'),
('103','Accountant','80000','120000'),('104','President','320000','520000');

-- select * from jobs;

create table departments (
department_id INT(4),
department_name varchar(30) NOT NULL,
-- manager_id INT(6),
location_id INT(4),
constraint pk_departments primary key(department_id),
constraint fk_departments_location_id foreign key(location_id) references locations(location_id)
);

create table job_history (
employee_id INT(6) NOT NULL,
start_date date NOT NULL,
end_date date NOT NULL,
job_id varchar(10) NOT NULL,
department_id INT(4),
constraint pk_job_history primary key(employee_id, start_date),
constraint fk_job_history_department_id foreign key(department_id) references departments(department_id),
constraint fk_job_history_job_id foreign key(job_id) references jobs(job_id),
constraint check_startlessthanend check ( start_date < end_date )
);

create table employees (
employee_id INT(6),
first_name varchar(20),
last_name varchar(25) NOT NULL,
email varchar(20) NOT NULL,
phone_number varchar(20),
hire_date date NOT NULL,
job_id varchar(10) NOT NULL,
salary DECIMAL(8,2),
commission_pct DECIMAL(2,2),
manager_id INT(6),
department_id INT(4),
constraint pk_employees_employee_id primary key(employee_id),
-- constraint fk_employees_manager_id foreign key(manager_id) references employees(employee_id),
constraint fk_employees_department_id foreign key(department_id) references departments(department_id),
constraint fk_employees_job_id foreign key(job_id) references jobs(job_id),
constraint emp_salary_min check (salary > 0)
);

alter table job_history add constraint fk_job_history_employee_id foreign key(employee_id) references employees(employee_id);

insert into departments values (5000,'SALES',1001),(6000,'ACCOUNTING',1003),(7000,'OPERATIONS',1002),(8000,'DESIGN',1004),
(9000,'RESEARCH',1005);

insert into employees values 
(856101,'Rahul', 'Shaw', 'rahul.shaw@gmail.com', '7896541230', '2018/09/13',100,25000,NULL,NULL,6000),
(856102,'Anindita', 'Ghosh', 'anindita.ghosh@gmail.com', '9896215478', '2015/03/24',101,58000,NULL,856103,7000),
(856103,'Tridib', 'Santra', 'tridib.santra@gmail.com', '9574197230', '2008/05/18',102,120000,NULL,NULL,5000),
(856104,'Somdutta', 'Deb', 'somdutta.deb@gmail.com', '8951741230', '2019/08/15',100,25000,NULL,NULL,9000),
(856105,'Soham', 'Samanta', 'soham.samanta@gmail.com', '8568951225', '2018/08/12',100,25000,0.99,NULL,8000),
(856106,'Raj', 'Majumdar', 'raj.majumdar@gmail.com', '8568955685', '2001/05/22',104,150000,0.80,NULL,7000),
(856107,'Soham', 'Samanta', 'soham.samanta2@gmail.com', '7868955865', '2005/05/02',102,160000,0.78,NULL,6000),
(856108,'Abhilash', 'Guha', 'abhilash.guha@gmail.com', '7088958025', '2004/08/12',104,450000,0.64,NULL,5000),
(856109,'Suparna', 'Mukherjee', 'suparna.mukherjee@gmail.com', '8568950421', '2006/07/22',102,130000,NULL,NULL,6000),
(856110,'Sudipta', 'Das', 'sudipta.das@gmail.com', '8568951225', '2002/03/22',102,160000,NULL,NULL,7000);

alter table employees add constraint fk_employees_manager_id foreign key(manager_id) references employees(employee_id);

alter table departments add manager_id INT(6) after department_name;

alter table departments add constraint fk_departments_manager_id foreign key(manager_id) references employees(employee_id);

update departments set manager_id = 856101 where department_id = 5000;
update departments set manager_id = 856103 where department_id = 6000;
update departments set manager_id = 856103 where department_id = 7000;
update departments set manager_id = 856102 where department_id = 8000;
update departments set manager_id = 856104 where department_id = 9000;

insert into job_history values 
(856106,'2001/05/22','2016/06/21',104,7000),
(856107,'2005/05/02','2018/05/22',102,6000),
(856108,'2004/08/12','2017/06/30',104,5000),
(856109,'2006/07/22','2016/03/11',102,6000),
(856110,'2002/03/22','2011/07/31',102,7000);

