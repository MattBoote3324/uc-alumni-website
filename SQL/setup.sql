/* Create ALUMNI and COUNTRY table statements */
drop table ALUMNI;
drop table COUNTRY;

CREATE TABLE COUNTRY(
COUNTRY_NAME varchar(50) primary key,
REGION varchar(13) not null,
constraint reg_check CHECK (REGION in ('ASIA', 'NORTH AMERICA', 'SOUTH AMERICA', 'AFRICA' , 'EUROPE', 'AUSTRALASIA'))
);

create table ALUMNI (
	ID int PRIMARY KEY,
    CITY varchar(40),
    POSTCODE varchar(20),
    COUNTRY varchar(50) references COUNTRY,
    CONSTRAINT CHECK_ID check (ID > 0)
);


/* Load data from CSV file
WARNING: load data statement must be updated with own file location */
LOAD DATA INFILE "C:/Users/Adam/University/INFO263/UC Alumni Project/uc-alumni-website/sql/alumni_table_data.csv"
INTO TABLE alumni
CHARACTER SET UTF8
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 ROWS;

LOAD DATA INFILE "C:/Users/Adam/University/INFO263/UC Alumni Project/uc-alumni-website/sql/country_table_data.csv"
INTO TABLE country
CHARACTER SET UTF8
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 ROWS;


/* Create Alumni Count Views */
drop view asia_count;
drop view europe_count;
drop view north_america_count;
drop view south_america_count;
drop view australasia_count;
drop view africa_count;
drop view nz_count;

CREATE VIEW ASIA_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'ASIA'
group by country_name;

CREATE VIEW EUROPE_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'EUROPE'
group by country_name;

CREATE VIEW NORTH_AMERICA_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'NORTH AMERICA'
group by country_name;

CREATE VIEW SOUTH_AMERICA_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'SOUTH AMERICA'
group by country_name;

CREATE VIEW AUSTRALASIA_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'AUSTRALASIA'
group by country_name;

CREATE VIEW AFRICA_COUNT as
select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'AFRICA'
group by country_name;

CREATE VIEW NZ_COUNT as
select CITY, count(CITY) as ALUMNI_COUNT
from ALUMNI
where COUNTRY = 'NEW ZEALAND' and CITY != ""
group by CITY;


/* Create a User with Restricted Access */
CREATE USER 'sec_user'@'localhost' identified by 'KfkHYRFhR2g6WcVJjPQChjNq';
GRANT SELECT, INSERT, UPDATE ON `sys`.* TO 'sec_user'@'localhost';


/* Create table to store members and login attempts */
drop table members;

create table MEMBERS (
	ID int primary key references ALUMNI,
    USERNAME varchar(30) not null,
    EMAIL varchar(50) not null,
    PASSWORD char(128) not null,
    CONSTRAINT CHECK_ID check (ID > 0)
);

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
);

drop table login_attempts;

create table LOGIN_ATTEMPTS (
	USER_ID int not null,
    TIME varchar(30) not null
);

CREATE TABLE `secure_login`.`login_attempts` (
    `user_id` INT(11) NOT NULL,
    `time` VARCHAR(30) NOT NULL
);

insert into MEMBERS
values(1, 'test_user', 'test@example.com', 'Passw0rd');

update members
set password = 'Passw0rd'
where username = 'test_user';

select * from members;
select * from login_attempts;

SELECT id, username, password FROM members WHERE email = 'test@example.com';

SELECT ID, USERNAME, `PASSWORD` FROM MEMBERS WHERE EMAIL = 'test@example.com';

select database();

SELECT *
from alumni
where alumni.id = 1;

UPDATE alumni
SET city = "ALEXANDRIA", postcode = "1", country = "EGYPT"
WHERE id = 1;

SELECT region FROM alumni JOIN country ON 'EGYPT' = country_name LIMIT 1;