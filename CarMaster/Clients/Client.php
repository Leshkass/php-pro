<?php

declare(strict_types=1);

namespace CarMaster\Clients;

use CarMaster\Cars\Car;
use CarMaster\Exceptions\InvalidName;

class Client
{
    private string $firstName;

    private string $surname;

    private array $cars;

    public function addCar(Car $car): void
    {
        $car->setClient($this);
        $this->cars[] = $car;
    }

    /**
     * @throws InvalidName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
        if (strlen($firstName) <= 2) {
            throw new InvalidName('First name must be at least 2 characters long');
        }
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->surname;
    }

    public function getCars(): array
    {
        return $this->cars;
    }
}
