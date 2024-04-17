<?php
declare(strict_types=1);

require_once 'autoloader.php';


use CarMaster\Clients\Client;
use CarMaster\Cars\BMW as MyCar;
use CarMaster\Cars\Audi;
use CarMaster\Spares\Tires as SummerTires;


try {

    $firstCar = new MyCar();
    $firstCar->setNameCar('BMW');
    $firstCar->setModelCar('E39');
    $firstCar->setYear(2003);

    $secondCar = new Audi();
    $secondCar->setNameCar('Audi');
    $secondCar->setModelCar('A6');
    $secondCar->setColor('black');
    $secondCar->setCarBody('Universal');

    //echo $firstCar->getInfo() . PHP_EOL;

    $client = new Client();
    $client->setFirstName('John');
    $client->setSurname('Wick');
    $client->addCar($firstCar);
    $client->addCar($secondCar);

    foreach ($client->getCars() as $car) {
        echo implode("\n", $car->getFullInfoCar()) . PHP_EOL;
    }

    //echo $client->getFullName() . PHP_EOL;

    $tires = new SummerTires();
    $tires->setMarkingTires('A35');
    $tires->setSizeTires(19);
    $tires->setManufacturerSpare('Italy');
    $tires->setVinCodeSpare(25);

    foreach($tires->getFullInfoSpares() as $items){
        echo $items.PHP_EOL;
    }







} catch (Exception $error){

    echo $error->getMessage();
}