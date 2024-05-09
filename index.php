<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require_once 'Repository/CarsRepository.php';

use CarMaster\Exceptions\InvalidSizeTire;
use CarMaster\Exceptions\InvalidYearCar;
use CarMaster\Exceptions\InvalidName;
use CarMaster\Clients\Client;
use CarMaster\Cars\BMW as MyCar;
use CarMaster\Cars\Audi;
use CarMaster\Spares\Tire as SummerTires;

const DB_HOST = 'mysql';
const DB_PORT = '3306';
const DB_NAME = 'garage_db';
const DB_CHARSET = 'utf8mb4';
const DB_USER = 'oleksii';
const DB_PASSWORD = '1q2w3e4r5t6y7u';

try {

    $dsn = 'mysql:host='. DB_HOST .';port='. DB_PORT .';dbname='. DB_NAME .';charset='. DB_CHARSET ;

    $connect = new PDO($dsn,DB_USER,DB_PASSWORD);

     echo 'Connect' . PHP_EOL;

    $firstCar = new MyCar();

    $firstCar->setNameCar('audi');
    $firstCar->setModel('A6');
    $firstCar->setYear(2002);

    $dbCar = new \Repository\CarsRepository($connect);

//    $dbCar->add([
//        'name' => $firstCar->getNameCar(),
//        'model' => $firstCar->getModel(),
//        'year' => $firstCar->getYear(),
//        'color' => 'black',
//        'body_type' => 'sedan',
//        'cars_id' => 45
//    ]);
//    $dbCar->findByID(['cars_id' => 88]);

//    $dbCar->delete([
//        'cars_id' => 23
//    ]);

//    $dbCar->update([
//        'name' => $firstCar->getNameCar(),
//        'model' => $firstCar->getModel(),
//        'cars_id' => 88
//    ]);

} catch (PDOException | InvalidYearCar $exception){

    echo $exception->getFile() . PHP_EOL;
    echo $exception->getLine() . PHP_EOL;
    echo $exception->getCode() . PHP_EOL;
    echo 'Disconnect' . PHP_EOL;
}











