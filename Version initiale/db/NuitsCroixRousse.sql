create database if not exists nuitscroixrousse character set utf8 collate utf8_unicode_ci;
use nuitscroixrousse;

grant all privileges on nuitscroixrousse.* to 'ncr_user'@'localhost' identified by 'secret';

drop table if exists t_concert;
drop table if exists t_genre;
drop table if exists t_user;

create table t_genre (
    gen_id integer primary key auto_increment,
    gen_name varchar(100) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_concert (
    conc_id integer primary key auto_increment,
    conc_artist varchar(100) not null,
    conc_date date not null,
    conc_place varchar(100) not null,
    conc_description varchar(300) not null,
    conc_price decimal(3) not null,
    gen_id integer not null,
    constraint fk_conc_gen foreign key(gen_id) references t_genre(gen_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_user (
  user_id integer primary key auto_increment,
  user_name varchar(100) not null,
  user_password varchar(100) not null,
  user_salt varchar(23) not null,
  user_role varchar(50) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

insert into t_genre(gen_name) values ('Rock');
insert into t_genre(gen_name) values ('R&B');
insert into t_genre(gen_name) values ('Electro');
insert into t_genre(gen_name) values ('Chanson');

insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('Crosby, Stills and Nash', '2014-10-09', 'Salle de la Ficelle', 'Incarnation des utopies et de la conscience politique de la génération Woodstock, ce trio de légende continue d’harmoniser des mélodies ayant survécu à toutes les désillusions.', 49, 1);
insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('Nick Cave & The Bad Seeds', '2014-10-10', 'Place des Tapis', 'Depuis plus de 30 ans, Nick Cave se fait le chroniqueur hors-pair des tourments de la chair et des impossibles rédemptions.', 39, 1);

insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('George Clinton & Parliament Funkadelic', '2014-10-10', 'Place des Tapis', 'Démiurge allumé d’une galaxie musicale protéiforme, au sein de groupes aussi mythiques que Parliament, Funkadelic ou les P.Funk All Stars, George Clinton n’en finit pas de célébrer la transe funk et psychédélique.', 45, 2);

insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('-M-', '2014-10-10', 'Place du Commandant Arnaud', 'Auteur-compositeur-producteur prolifique, guitariste virevoltant, Matthieu Chédid ne s’exprime jamais mieux que quand M prend le contrôle de la scène.', 45, 4);
insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('Lou Doillon', '2014-10-12', 'Place Tabareau', 'En moins d’un an, le coup d’essai s’est transformé en coup de maître, voire en rêve éveillé, pour celle que son producteur, Etienne Daho, surnommait, il y a peu, « le secret le mieux gardé de la famille ».', 35, 4);
insert into t_concert(conc_artist, conc_date, conc_place, conc_description, conc_price, gen_id) values
('Benjamin Biolay', '2014-10-11', 'Salle de la Ficelle', 'Enfant du pays, Benjamin Biolay, formé au Conservatoire de Lyon (trombone), a déjà foulé le sol du Grand Théâtre de nombreuses fois.', 39, 4);

/* Raw password is 'secret' */
insert into t_user(user_name, user_password, user_salt, user_role) values
('admin', 'YRKBx8oeQ2sLBrEqjJeqc8UwC9HPp+Ed6dhCeeHPQJ9vY4vbMepUbS14/rE6njWr4RZd4E+tU4pcOMI0h8Z6UA==','mnPEaJNz6,rUPbAYGg6$UXt', 'ROLE_ADMIN');