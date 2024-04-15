<?php
declare(strict_types=1);


class Client
{
    private string $firstName;
    private string $secondName;

    private array $cars;

    public function addCar(Car $car): void
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

    public function getSecondName(): string
    {
        return $this->secondName;
    }

    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->secondName;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

}