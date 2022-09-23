create database bd_onpoint;
use bd_onpoint;

create table usuario(
id int unsigned auto_increment not null primary key,
nome varchar(80) not null,
email varchar(80) not null,
senha varchar(40) not null
)engine=innodb;

select * from usuario;
select email from usuario where email = "22000283@aluno.cotemig.com.br";
drop database bd_onpoint;
truncate table usuario;
insert into usuario values(null,"tralala","tralala@gmail.com","123456789");