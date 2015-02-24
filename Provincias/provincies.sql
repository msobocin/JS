
CREATE DATABASE provincies DEFAULT CHARACTER SET utf8;
USE provincies;

#CREATE USER alumne IDENTIFIED BY 'keiL2lai';
#GRANT ALL ON provincies.* TO alumne@localhost identified by "keiL2lai";
#flush privileges;



CREATE TABLE comunitat(
id_com smallint primary key,
comunitat varchar(20) not null
);

CREATE TABLE provincia(
id_prov smallint primary key,
provincia varchar(20) not null,
id_com  smallint references comunitat(id_com)
);

insert into comunitat (id_com, comunitat) values (1,'catalunya');
insert into comunitat (id_com, comunitat) values (2,'aragón');
insert into comunitat (id_com, comunitat) values (3,'castilla-león');

insert into provincia (id_prov, provincia, id_com) values (1, 'barcelona', 1);
insert into provincia (id_prov, provincia, id_com) values (2, 'girona', 1);
insert into provincia (id_prov, provincia, id_com) values (3, 'huesca', 2);
insert into provincia (id_prov, provincia, id_com) values (4, 'zaragoza', 2);
insert into provincia (id_prov, provincia, id_com) values (5, 'zamora', 3);

