create database bd_onpoint;
use bd_onpoint;

create table usuario(
id int unsigned auto_increment not null primary key,
nome varchar(80) not null,
email varchar(80) not null,
senha varchar(40) not null
)engine=innodb;

select * from usuario;

