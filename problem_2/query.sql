create table if not exists employee_code_table (
	emp_code varchar(30) not null check (emp_code='su_%'),
	emp_code_name varchar(20) not null,
	emp_domain varchar(20) not null,
	primary key(emp_code)
);


create table if not exists employee_salary_table (
	emp_id int(5) not null auto_increment,
	emp_id_prefix varchar(2) default "RU",
	emp_salary int(10) not null,
	emp_code varchar(30) unique,
	primary key (emp_id)
);


create table if not exists employee_details_table (
	emp_id int(5) not null auto_increment,
	emp_id_prefix varchar(2) default "RU",
	emp_first_name varchar(20) not null unique,
	emp_last_name varchar(20) not null,
	graduation_percentile int(3) not null,
	primary key (emp_id, emp_id_prefix)
);
	
