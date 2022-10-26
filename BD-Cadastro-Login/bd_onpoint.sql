create database bd_onpoint;
use bd_onpoint;

create table usuario(
id int unsigned auto_increment not null primary key,
nome varchar(80) not null,
email varchar(80) not null,
senha varchar(40) not null
)engine=innodb;
select * from usuario;
create table guarda(
id int unsigned auto_increment not null primary key,
id_usuario int unsigned not null,
foreign key(id_usuario) references usuario(id)
)engine=innodb;
select * from guarda;
create table item(
id int unsigned auto_increment not null primary key,
nome varchar(100) not null,
descricao varchar(150),
arquivo blob,
id_guarda int unsigned not null,
foreign key(id_guarda) references guarda(id)
)engine=innodb;
select * from item;
create table ajudar(
id int unsigned auto_increment not null primary key,
evento varchar(50),
estilo varchar(20),
horario time,
clima varchar(50),
descricao varchar(100),
id_guarda int unsigned not null,
foreign key(id_guarda) references guarda(id)
)engine=innodb;

select guarda.id,usuario.id
from guarda join usuario
on usuario.id = guarda.id_usuario;

insert into usuario values(null,"min","min@gmail.com","123");

insert into usuario values (null,"adsbhdiu","dih@gmail","1234");

delete from guarda where id != 0;
delete from item where id != 0;
delete from usuario where id != 0;

delimiter $$

CREATE DEFINER = CURRENT_USER TRIGGER `bd_onpoint`.`usuario_AFTER_INSERT` AFTER INSERT ON `usuario` FOR EACH ROW
BEGIN
 insert into guarda values (null,new.id);
END
$$

-- drop database bd_onpoint