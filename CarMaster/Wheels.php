<?php

declare(strict_types=1);

require_once 'Car.php';

class Wheels extends Car
{
    private string $manufacturer;

    private int|float $size;

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getSize(): float|int
    {
        return $this->size;
    }

    public function setSize(float|int $size): void
    {
        $this->size = $size;
    }

    public function getFullInfo(): string
    {
        return parent::getNameCar() . ' ' . parent::getModelCar() . PHP_EOL . $this->getManufacturer() . ' ' .$this->getSize() . PHP_EOL;
    }
}