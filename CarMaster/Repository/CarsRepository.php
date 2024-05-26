<?php

declare(strict_types=1);

namespace CarMaster\Repository;


use CarMaster\Entity\Car;
use PDO;

readonly class CarsRepository
{

    public function __construct(private PDO $pdo)
    {

    }

    public function add(Car $car): void
    {
        $statement = $this->pdo->prepare(
          'INSERT INTO cars (name, model,year,color, body_type)
                    VALUES (:name, :model, :year, :color, :body_type)'
        );


        $statement->execute([
            ':name' => $car->getBrand(),
            ':model' => $car->getModel(),
            'year' => $car->getYear(),
            ':color' => $car->getColor(),
            ':body_type' => $car->getBodyType()
        ]);
    }

    public function delete(Car $car): void
    {
        $statement = $this->pdo->prepare('DELETE FROM cars WHERE cars_id = :cars_id');
        $statement->execute([
           ':cars_id' => $car->getCarsId()
        ]);
    }

    public function update(Car $car): void
    {
        $statement = $this->pdo->prepare('UPDATE cars SET name = :name , model = :model WHERE id = :id');
        $statement->execute([
           ':name' => $car->getBrand(),
           ':model' => $car->getModel()
        ]);
    }

    public function findByID(Car $car): void
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