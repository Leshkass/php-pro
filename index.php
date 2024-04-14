<?php
declare(strict_types=1);

require_once 'CarMaster/Car.php';
require_once 'CarMaster/Wheels.php';

try {

    $firstCar = new Wheels();
    $firstCar->setNameCar('Ford');
    $firstCar->setModelCar('Shelby GT 500');
    $firstCar->setManufacturer('Michelin');
    $firstCar->setSize(18);

    echo $firstCar->getFullInfo();

} catch (Exception $error){

    echo $error->getMessage();
}