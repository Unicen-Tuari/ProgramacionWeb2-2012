create table categoria (
  codigo integer auto_increment,
  cat varchar (50) not null,
  primary key (codigo)
);

create table consulta (
  codigo integer auto_increment,
  nombre varchar (50) not null,
  mail varchar (50) not null,
  con text not null,
  primary key (codigo)
);

create table producto (
  codigo integer auto_increment,
  nombre varchar (50) not null,
  nombre_imagen varchar (50) not null,
  precio varchar (10) not null,
  cantidad integer not null,
  caracteristicas text not null,
  fecha_ingreso date not null,
  codigo_categoria integer not null,
  primary key (codigo),
  foreign key (codigo_categoria) references categoria (codigo)
);

create table usuario (
  codigo integer auto_increment,
  usu varchar (50) not null,
  password varchar (50) not null,
  primary key (codigo)
);