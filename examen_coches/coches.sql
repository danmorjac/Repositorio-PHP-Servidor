CREATE DATABASE coches if not exists
CHARACTER SET utf8
COLLATE utf8_spanish_ci;
use coches;
CREATE TABLE coches(
    id integer (auto_increment) constraint coc_coc_pk primary key(id)not null,
    marca varchar(20)not null,
    modelo varchar(20)not null, 
    foto varbinary(max)not null,
);