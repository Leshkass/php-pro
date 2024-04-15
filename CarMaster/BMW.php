<?php

declare(strict_types=1);

require_once 'Car.php';


class BMW extends Car
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
    public function getFullInfoCar(): array
    {
        $fullInfo = parent::getFullInfoCar();
        $fullInfo[] = $this->year;

        return $fullInfo;
    }

    protected function Examination(): void
    {
        if ($this->year == '') {
            throw new Exception('Year of issue must not be empty');
        }
    }
}