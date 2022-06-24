CREATE TABLE condutor (
    con_cod int NOT NULL AUTO_INCREMENT,
    con_nome varchar(45),
    con_num_multas int,
    con_pontos int,
    con_categoria varchar(2),
  PRIMARY KEY (con_cod)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

create table veiculo(
    vei_cod int not null AUTO_INCREMENT,
    vei_placa varchar(7),
    con_cod int not null,
    vei_modelo varchar(20),
    vei_marca varchar(45),
    vei_ano int,
    primary key(vei_cod),
    foreign key(con_cod) references condutor(con_cod) on delete restrict on update cascade 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



create table documentoCondutor(
  docC_cod int not null AUTO_INCREMENT,
  docC_cpf varchar(45),
  docC_dataValidade date,
  docC_nascimento date,
  con_cod int,
  primary key (docC_cod),
  foreign key(con_cod) references condutor(con_cod) on delete restrict on update cascade 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

create table acidente(
  vei_placa varchar(7),
  con_cod int,
  acid_cod int not null AUTO_INCREMENT,
  acid_data date,
  acid_num_vitimas int,
  primary key(acid_cod),
  foreign key(con_cod) references condutor(con_cod) on delete restrict on update cascade,
  foreign key(vei_placa) references veiculo (vei_placa) on delete restrict on update cascade 
);

create table documentoVeic(
  docV_cod int not null AUTO_INCREMENT,
  vei_placa varchar(7),
  docv_renavam varchar(11),
  primary key(docV_cod),
  foreign key(vei_placa) references veiculo(vei_placa) on delete restrict on update cascade
);




insert into condutor(
con_nome,con_num_multas,con_pontos,con_categoria)VALUES
("Debora Montenegro",0,0,"AB"),
("Breno Alcantara",2,11,"A"),
("João Pereira",4,25,"E"),
("Carlos Silva",2,14,"AB"),
("Fernando Santos",1,7,"B"),
("Flavio Cipriani",5,30,"C"),
("Zé Conceição",1,5,"D");



insert into veiculo(
vei_placa,vei_modelo,vei_marca,vei_ano,con_cod)VALUES
("BAR5P56","A5","Audi",2019,1),
("BJI8P87","Srad 750","Suzuki",2011,1),
("BSE4R52","Xt 660r","Yamaha",2003,2),
("BJH5Y90","R730 V8","Scania",2014,3),
("BYH3P12","Voyage","Wolksvagem",2020,4),
("BHY6P83","Celta","Chevrolet",2013,5),
("BKL5P45","Biz 125","Honda",2008,6),
("BMW4K60","Caçamba 1620","Mercedez Benz",2003,6),
("BHG4PBH","Van Sprinter","Mercedez Benz",2017,7);

insert into documentoCondutor(
docC_cpf,docC_dataValidade,docC_nascimento,con_cod) values
("101.201.301-01","2022-03-28","1990-01-01",1),
("201.202.302-02","2023-06-03","2001-06-25",2),
("301.203.303-03","2021-01-07","1994-04-19",3),
("401.204.304-04","2019-08-12","1976-12-16",4),
("501.205.305-05","2020-12-30","1999-11-12",5),
("601.206.306-06","2023-07-08","1985-09-27",6),
("701.207.307-07","2026-08-02","1979-05-21",7);

insert into acidente(
vei_placa,con_cod,acid_data,acid_num_vitimas)values
("BJH5Y90",3,"2019-04-12",1),
("BHY6P83",5,"2016-02-27",0),
("BAR5P56",6,"2021-11-20",2);

insert into documentoVeic(
vei_placa,docv_renavam) values
("BAR5P56","12345678911"),
("BJI8P87","09127512542"),
("BSE4R52","82950613561"),
("BJH5Y90","84169426404"),
("BYH3P12","00743178965"),
("BHY6P83","00760098752"),
("BKL5P45","11134000980"),
("BMW4K60","00098432167"),
("BHG4PBH","88760009312");

carro,condutor, acidentes,
drop table  documentoCondutor,documentoVeic;