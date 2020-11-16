use bdproiect;


create table user_db( 
user_id int   AUTO_INCREMENT not null , 
username varchar(25) not null, 
pwd varchar(50) not null, 
constraint user_id_pk primary key(user_id) 
);

create table user_info( 
user_number int   AUTO_INCREMENT not null , 
user_firstname varchar(50) not null,
user_lastname varchar(50) not null,
user_birthdate date, 
CONSTRAINT user_id_FK FOREIGN KEY (user_number) REFERENCES user_db (user_id)
);

create table user_movies( 
user_idm int not null ,
title varchar(25) not null,
imdb_id varchar(25) not null,
status varchar(25) not null,
CONSTRAINT user_idm_CK CHECK(user_idm>1)
);

create table movies_info( 
imdb_code varchar(25) unique  not null,
title varchar(25) not null,
genre varchar(50) not null,
imdb_rating float(10) not null,
release_date date
);


drop table user_movies;
drop table user_info;
drop table user_db;
drop table movies_info;

select * from user_db;
select * from user_info;
select * from user_movies;  
select * from movies_info;



INSERT INTO user_db (username, pwd) VALUES ( 'admin', 'admin');
INSERT INTO user_db (username, pwd) VALUES ( 'user1', 'parola1');
INSERT INTO user_db (username, pwd) VALUES ( 'user2', 'parola2');
INSERT INTO user_db (username, pwd) VALUES ( 'user3', 'parola3');
INSERT INTO user_db (username, pwd) VALUES ( 'user4', 'parola4');

INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) VALUES('Marius-Iulian', 'Rosca', (STR_TO_DATE('12 JUL 1997','%d %b %Y')));
INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) VALUES('Jon', 'Doe', (STR_TO_DATE('01 JAN 1970','%d %b %Y')));
INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) VALUES('Jane', 'Doe', (STR_TO_DATE('15 MAY 1995','%d %b %Y')));
INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) VALUES('Jack', 'Doe', (STR_TO_DATE('12 OCT 2001','%d %b %Y')));
INSERT INTO user_info (user_firstname, user_lastname,user_birthdate) VALUES('Jelly', 'Doe', (STR_TO_DATE('07 NOV 2010','%d %b %Y')));

INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('2','The Avengers' , 'tt0848228','Unseen');
INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('3','The Avengers' , 'tt0848228','Unseen');
INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('2','Blade Runner 2049', 'tt1856101','Unseen'); 
INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('3','Avengers: Age of Ultron' , 'tt2395427','Unseen'); 
INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('4','Avengers: Infinity War', 'tt4154756','Unseen'); 
INSERT INTO user_movies(user_idm,title,imdb_id,status) VALUES('2','Avengers: Endgame', 'tt4154796','Unseen'); 

INSERT INTO movies_info (imdb_code, title, genre, imdb_rating, release_date) 
VALUES('tt1856101', 'Blade Runner 2049', 'Drama, Mystery' , 8.0 , STR_TO_DATE('06 Oct 2017','%d %b %Y'));
insert into movies_info(imdb_code, title, genre, imdb_rating,release_date) 
values('tt0848228','The Avengers','Action, Adventure, Sci-Fi',8.1,(STR_TO_DATE('04 May 2012','%d %b %Y')));
insert into movies_info(imdb_code, title, genre, imdb_rating,release_date) 
values('tt2395427','Avengers: Age of Ultron','Action, Adventure, Sci-Fi',7.3,(STR_TO_DATE('01 May 2015','%d %b %Y')));
insert into movies_info(imdb_code, title, genre, imdb_rating,release_date) 
values('tt4154756','Avengers: Infinity War','Action, Adventure, Sci-Fi',8.5,(STR_TO_DATE('27 Apr 2018','%d %b %Y')));
insert into movies_info(imdb_code, title, genre, imdb_rating,release_date) 
values('tt4154796','Avengers: Endgame','Action, Adventure, Sci-Fi',8.9,(STR_TO_DATE('26 Apr 2019','%d %b %Y')));
