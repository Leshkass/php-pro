<?php
declare(strict_types=1);

namespace CarMaster\Clients;

use CarMaster\Cars\Cars;

class Client
{
    private string $firstName;
    private string $surname;
    public function addCar(Cars $car): void
    {
        $car->setClient($this);
        $this->cars[] = $car;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getSurname(): string
    {
        return $this->surname;
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