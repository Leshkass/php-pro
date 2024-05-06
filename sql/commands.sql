create database garage_db;

use garage_db;


create table client
(
    id  int unsigned auto_increment primary key,
    first_name varchar(50) not null,
    sur_name  varchar(50) not null,
    client_id int unsigned not null
);

create table cars_client
(
    client_id int unsigned not null,
    cars_id int unsigned not null,
    primary key (client_id,cars_id),
    constraint cars_client_ibfk_1 foreign key (client_id)  references client(id),
    constraint cars_client_ibfk_2 foreign key (cars_id) references cars(id)
);




create table consumable
(
    id  int unsigned auto_increment primary key,
    color char(50) null,
    temperature tinyint(3) not null,
    viscosity char(100) null,
    quantity tinyint(150) not null,
    country_manufacturer char(100) not null,
    consumable_id int unsigned not null
);

create table cars_consumable
(
    cars_id int unsigned not null,
    consumable_id int unsigned not null,
    primary key (cars_id,  consumable_id),
    constraint cars_consumable_ibfk_1 foreign key (consumable_id)  references consumable(id),
    constraint cars_consumable_ibfk_2 foreign key (cars_id)  references cars(id)
);

create table spares
(
    id int unsigned auto_increment primary key,
    vincode_spare tinyint(30) not null,
    manufacturerSpare char(150) not null,
    size tinyint(30) not null,
    marking char(30) not null,
    spares_id int unsigned not null
);

create table cars_spares
(
    cars_id int unsigned not null,
    spares_id int unsigned not null,
    primary key (cars_id,  spares_id),
    constraint cars_spares_ibfk_1 foreign key (spares_id)  references spares(id),
    constraint cars_spares_ibfk_2 foreign key (cars_id)  references cars(id)

);

create table cars
(
    id int unsigned auto_increment primary key,
    name char(150) not null,
    model char(50) not null,
    year tinyint(4) not null,
    color char(50) null,
    body_type char(50) not null,
    cars_id int unsigned not null
);



