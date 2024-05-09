<?php

declare(strict_types=1);

namespace Repository;

use CarMaster\Cars\Car;
use PDO;
readonly class CarsRepository
{

    public function __construct(private PDO $pdo)
    {

    }


    public function add(array $data): void
    {
        $statement = $this->pdo->prepare(
          'INSERT INTO cars (name, model, year, color, body_type, cars_id)
                    VALUES (:name, :model, :year, :color, :body_type, :cars_id)'
        );

        $statement->execute([
            ':name' => $data['name'],
            ':model' => $data['model'],
            ':year' => $data['year'],
            ':color' => $data['color'],
            ':body_type' => $data['body_type'],
            ':cars_id' => $data['cars_id']
        ]);
    }

    public function delete(array $data): void
    {
        $statement = $this->pdo->prepare('DELETE FROM cars WHERE cars_id = :cars_id');
        $statement->execute([
           ':cars_id' => $data['cars_id']
        ]);
    }

    public function update(array $data): void
    {
        $statement = $this->pdo->prepare('UPDATE cars SET name = :name , model = :model WHERE cars_id = :cars_id');
        $statement->execute([
           ':name' => $data['name'],
           ':model' => $data['model'],
           ':cars_id' => $data['cars_id']
        ]);
    }

    public function findByID(array $data): void
    {
        $statement = $this->pdo->prepare('SELECT * FROM cars WHERE cars_id = :cars_id');
        $statement->execute([
            ':cars_id' => $data['cars_id']
        ]);

        $foundCars = $statement->fetch(PDO::FETCH_ASSOC);

        foreach ($foundCars as $foundCar) {
            echo $foundCar . PHP_EOL;
        }

    }
}