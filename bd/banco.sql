-- dops
drop database ebook;

create database ebook;

use ebook;

create table eb_tipo_usr(
	id_tipo int auto_increment primary key,
	tipo varchar(30)
);

insert into eb_tipo_usr values('','usuario padrão');
insert into eb_tipo_usr values('','usuario gerador de conteudo');
insert into eb_tipo_usr values('','administrador');

create table eb_usuario(
	id_usuario int auto_increment primary key,
	nome varchar(80),
	email varchar(80),
	senha varchar(80),
	cpf varchar(11),
	dt_nasc date,
	telefone varchar(15),	
	fk_tipo_usr int,
	ativo boolean,
	dt_criacao date,
	foreign key (fk_tipo_usr) references eb_tipo_usr (id_tipo)
);

insert into eb_usuario values('','usuario de teste','email@email.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','40991663098','1999-04-16','(00) 90000-0000',1,1,'2021-02-26');

create table eb_curso(
	id_curso int auto_increment primary key,
	titulo varchar(100),
	descricao text,
	avaliacao varchar(11),
	capa varchar(80),
	arquivo varchar(80),
	data_postagem date,
	valor varchar(10),
	postador varchar(10),
	sorteio varchar(80),
	n_sorteio varchar(20),
	destaque boolean,
	ativo boolean
);


create table eb_curso_destaque(
	id_curso int,
	destaque  boolean
);

create table eb_curso_usuario(
	id_vinculo int auto_increment primary key,
	fk_id_usuario_vinculo int,
	fk_id_curso_vinculo int,
	foreign key (fk_id_usuario_vinculo) references eb_usuario(id_usuario),
	foreign key (fk_id_curso_vinculo) references eb_curso(id_curso),
	ativo_vinculo boolean
);





-- Admin
create table admin(
  id_admin int auto_increment primary key,
  usuario varchar(150),
  senha varchar(150)
);

insert into admin values ('','admin','40bd001563085fc35165329ea1ff5c5ecbdbbeef');