/* Test Code for Views */
select count(*) from south_america_count;
select * from north_america_count;

select COUNTRY_NAME, count(COUNTRY_NAME) as ALUMNI_COUNT
from COUNTRY join ALUMNI on COUNTRY_NAME = COUNTRY
where REGION = 'AUSTRALASIA'
group by country_name;

select CITY, count(CITY) as ALUMNI_COUNT
from ALUMNI
where COUNTRY = 'NEW ZEALAND' and CITY != ""
group by CITY;