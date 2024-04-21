<?php

declare(strict_types=1);

namespace CarMaster\Cars;

use CarMaster\Exceptions\InvalidYearCar;


class BMW extends Car
{
    private int $year;

    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @throws InvalidYearCar
     */
    public function setYear(int $year): void
    {
        $this->year = $year;

        if (($this->year) <= 1980) {

            throw new InvalidYearCar('Year must be  more 1980');
        }
    }
    public function getFullInfoCar(): array
    {
        $fullInfo = parent::getFullInfoCar();
        $fullInfo[] = $this->year;

        return $fullInfo;
    }

}