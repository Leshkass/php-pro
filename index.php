<?php
declare(strict_types=1);

require_once 'CarMaster/Client.php';
require_once 'CarMaster/BMW.php';
require_once 'CarMaster/Tires.php';

try {

    $firstCar = new BMW();
    $firstCar->setNameCar('BMW');
    $firstCar->setModelCar('E39');
    $firstCar->setColor('Black');
    $firstCar->setYear(2003);

    echo $firstCar->getInfo() . PHP_EOL;

    $client = new Client();
    $client->setFirstName('John');
    $client->setSecondName('Wick');

    echo $client->getFullName() . PHP_EOL;

    $tires = new Tires();
    $tires->setMarkingTires('A35');
    $tires->setSizeTires(19);
    $tires->setManufacturerSpare('Italy');
    $tires->setVinCodeSpare(25-36-89);

    echo $tires->getFullInfoTies() . PHP_EOL;







} catch (Exception $error){

    echo $error->getMessage();
}