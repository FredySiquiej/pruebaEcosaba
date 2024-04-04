create database pasteleria;
use pasteleria;

create table pastel(
id_pastel int not null auto_increment,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(100) NOT NULL,
preparado_por VARCHAR(50) NOT NULL,
fecha_creacion DATE,
fecha_vencimiento DATE,
PRIMARY	KEY (id_pastel)
)
;

create table ingrediente(
id_ingrediente int not null auto_increment,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(100) NOT NULL,
fecha_ingreso DATE,
fecha_vencimiento DATE,
PRIMARY	KEY (id_ingrediente)
)
;

create table pastel_ingredientes(
id_pastel_ingrediente int not null auto_increment,
id_pastel int,
id_ingrediente int,
PRIMARY	KEY (id_pastel_ingrediente),
FOREIGN KEY (id_pastel) REFERENCES pastel(id_pastel),
FOREIGN KEY (id_ingrediente) REFERENCES ingrediente(id_ingrediente)
);

