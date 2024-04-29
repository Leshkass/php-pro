<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use CarMaster\Exceptions\InvalidSizeTire;
use CarMaster\Exceptions\InvalidYearCar;
use CarMaster\Exceptions\InvalidName;
use CarMaster\Clients\Client;
use CarMaster\Cars\BMW as MyCar;
use CarMaster\Cars\Audi;
use CarMaster\Spares\Tire as SummerTires;

try {
    $firstCar = new MyCar();
    $firstCar->setBrand('BMW');
    $firstCar->setModel('E39');
    $firstCar->setYear(2002);

    $secondCar = new Audi();
    $secondCar->setBrand('Audi');
    $secondCar->setModel('A6');
    $secondCar->setColor('black');
    $secondCar->setBodyType('Universal');

    $client = new Client();
    $client->setFirstName('John');
    $client->setSurname('Wick');
    $client->addCar($firstCar);
    $client->addCar($secondCar);

    foreach ($client->getCars() as $car) {
        echo implode("\n", $car->getFullInfo()) . PHP_EOL;
    }

    $tires = new SummerTires();
    $tires->setMarking('A35');
    $tires->setSize(14);
    $tires->setManufacturer('Italy');
    $tires->setVinCode(25);

    //    foreach($tires->getFullInfo() as $items){
    //        echo $items . PHP_EOL;
    //    }

} catch (InvalidName $error) {
    echo 'Error: ' . $error->getCode() . ' ' . $error->getMessage() .  PHP_EOL;
} catch (InvalidYearCar | InvalidSizeTire $error) {
    echo 'Error: ' . $error->getMessage() . PHP_EOL;
}
