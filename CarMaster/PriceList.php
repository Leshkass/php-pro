<?php
declare(strict_types=1);

require_once 'Car.php';
class PriceList extends Car
{

    private string $nameMaster;

    private array $work;

    private int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getNameMaster(): string
    {
        return $this->nameMaster;
    }

    public function setNameMaster(string $nameMaster): void
    {
        $this->nameMaster = $nameMaster;
    }

    public function getWork(): array
    {
        return $this->work;
    }

    public function setWork(array $work): void
    {
        $this->work = $work;
    }

}