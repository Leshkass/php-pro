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
    $firstCar->setNameCar('BMW');
    $firstCar->setModelCar('E39');
    $firstCar->setYear(2002);

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

//    foreach ($client->getCars() as $car) {
//        echo implode("\n", $car->getFullInfoCar()) . PHP_EOL;
//    }

    //echo $client->getFullName() . PHP_EOL;

    $tires = new SummerTires();
    $tires->setMarkingTire('A35');
    $tires->setSizeTire(14);
    $tires->setManufacturerSpare('Italy');
    $tires->setVinCodeSpare(25);

//    foreach($tires->getFullInfoSpares() as $items){
//        echo $items.PHP_EOL;
//    }

} catch (InvalidYearCar $error){
    echo $error->getMessage() . PHP_EOL;
} catch (InvalidName $error){
    echo $error->getCode() . ' ' . $error->getMessage() .  PHP_EOL;
} catch (InvalidSizeTire $error){
    echo 'Error: ' . $error->getMessage() . PHP_EOL;
}

$faker = Faker\Factory::create();

echo $faker->name() . PHP_EOL . $faker->year() . PHP_EOL;
echo $faker->city() . PHP_EOL . $faker->country() . PHP_EOL;