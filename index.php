<?php
declare(strict_types=1);

require_once 'CarMaster/Car.php';
require_once 'CarMaster/Audi.php';
require_once 'CarMaster/BMW.php';
require_once 'CarMaster/Consumables.php';
require_once 'CarMaster/Oil.php';
require_once 'CarMaster/Antifreeze.php';
require_once 'CarMaster/Spares.php';
require_once 'CarMaster/Bearings.php';
require_once 'CarMaster/Tires.php';

try {

    $firstCar = new BMW();
    $firstCar->setNameCar('BMW');
    $firstCar->setModelCar('E39');
    $firstCar->setColor('Black');
    $firstCar->setYear(2003);

    $secondCar = new Tires();
    $secondCar->setMarkingTires('A35');
    $secondCar->setSizeTires(19);
    //echo $firstCar->getInfo();



} catch (Exception $error){

    echo $error->getMessage();
}