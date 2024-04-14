<?php
declare(strict_types=1);

require_once 'CarMaster/Car.php';
require_once 'CarMaster/Wheels.php';

try {

    $firstCar = new BMW();
    $firstCar->setModelCar('E39');
    $firstCar->setColor('Black');
    $firstCar->setYear(2003);

} catch (Exception $error){

    echo $error->getMessage();
}