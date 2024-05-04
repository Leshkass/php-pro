create database garage_db;

use garage_db;


create table client
(
    id  int unsigned auto_increment primary key,
    first_name varchar(50) not null,
    sur_name  varchar(50) not null
);


create table consumable
(
    id  int unsigned auto_increment primary key,
    color char(50) null,
    temperature tinyint(3) not null,
    viscosity char(100) null,
    quantity tinyint(150) not null,
    countryManufacturer char(100) not null,
    brand_id int unsigned not null,
    consumable_id int unsigned not null,
    foreign key (consumable_id) references cars (id)

);



create table spares
(
    id int unsigned auto_increment primary key,
    vinCodeSpare tinyint(30) not null,
    manufacturerSpare char(150) not null,
    size tinyint(30) not null,
    marking char(30) not null,
    spares_id int unsigned not null,
    foreign key (spares_id) references cars (id)
);

create table cars
(
    id int unsigned auto_increment primary key,
    name char(150) not null,
    model char(50) not null,
    year tinyint(4) not null,
    color char(50) null,
    bodyType char(50) not null,
    cars_id int unsigned not null,
    foreign key (cars_id) references client (id)
);
