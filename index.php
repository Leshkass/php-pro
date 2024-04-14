<?php
declare(strict_types=1);

require_once 'CarMaster/Car.php';
require_once 'CarMaster/Audi.php';
require_once 'CarMaster/BMW.php';

try {

    $firstCar = new BMW();
    $firstCar->setNameCar('BMW');
    $firstCar->setModelCar('E39');
    $firstCar->setColor('Black');
    $firstCar->setYear(2003);

    echo $firstCar->getInfo();

} catch (Exception $error){

    echo $error->getMessage();
}