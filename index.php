<?php
declare(strict_types=1);

require_once 'CarMaster/Client.php';
require_once 'CarMaster/Consumables.php';
require_once 'CarMaster/PriceList.php';
require_once 'CarMaster/Procurement.php';

try {
    $firsCar = new Consumables();

    $firsCar->setOil('Mobil');
    $firsCar->setAntifreeze('Felix');
    $firsCar->setQuantityOil(5);
    $firsCar->setQuantityAntifreeze(8);

    $secondCar = new Client();
    $secondCar->setFirstName('John');
    $secondCar->setLastName('Wick');

    $thirdCar = new Procurement();
    $thirdCar->setNameCar('Ford');
    $thirdCar->setModelCar('Shelby GT');
    $thirdCar->setHorsePower(650);

    echo $secondCar->getFullName() . PHP_EOL;
    echo $thirdCar->getNameCar() . ' ' . $thirdCar->getModelCar() . ' ' . $thirdCar->getHorsePower() . PHP_EOL;
} catch (Exception $error){

    echo $error->getMessage();
}