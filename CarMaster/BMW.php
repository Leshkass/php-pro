<?php

declare(strict_types=1);

require_once 'Audi.php';

class BMW extends Audi
{
    private int $year;

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }
    public function getInfo(): string
    {
        return parent::getNameCar() . ' ' . parent::getModelCar() . PHP_EOL
                . parent::getColor() . ' ' . $this->getYear()  . PHP_EOL;
    }

    protected function Examination(): void
    {
        if ($this->year == '') {
            throw new Exception('Year of issue must not be empty');
        }
    }
}