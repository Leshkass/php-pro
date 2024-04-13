<?php
declare(strict_types=1);

class Client
{
    private string $firstName;

    private string $lastName;
    private array $car;

    public function addCar(Car $car): void
    {
        $car->setClient($this);
        $this->car[] = $car;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getCar(): array
    {
        return $this->car;
    }


}