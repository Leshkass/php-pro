<?php

declare(strict_types=1);

namespace Repository;

use CarMaster\Cars\BMW;
use PDO;
readonly class CarsRepository
{

    public function __construct(private PDO $pdo)
    {

    }


    public function add(BMW $car): void
    {
        $statement = $this->pdo->prepare(
          'INSERT INTO cars (name, model,year,cars_id)
                    VALUES (:name, :model, :year,:cars_id)'
        );


        $statement->execute([
            ':name' => $car->getNameCar(),
            ':model' => $car->getModel(),
            'year' => $car->getYear(),
            ':cars_id' => $car->getCarsId()
        ]);
    }

    public function delete(BMW $car): void
    {
        $statement = $this->pdo->prepare('DELETE FROM cars WHERE cars_id = :cars_id');
        $statement->execute([
           ':cars_id' => $car->getCarsId()
        ]);
    }

    public function update(BMW $car): void
    {
        $statement = $this->pdo->prepare('UPDATE cars SET name = :name , model = :model WHERE cars_id = :cars_id');
        $statement->execute([
           ':name' => $car->getNameCar(),
           ':model' => $car->getModel(),
           ':cars_id' => $car->getCarsId()
        ]);
    }

    public function findByID(BMW $car): void
    {
        $statement = $this->pdo->prepare('SELECT * FROM cars WHERE cars_id = :cars_id');
        $statement->execute([
            ':cars_id' => $car->getCarsId()
        ]);

        $foundCars = $statement->fetch(PDO::FETCH_ASSOC);

        foreach ($foundCars as $foundCar) {
            echo $foundCar . PHP_EOL;
        }

    }
}