<?php

declare(strict_types=1);

namespace CarMaster\Cars;

class Audi extends Car
{
    private string $color;

    private string $carBody;

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getCarBody(): string
    {
        return $this->carBody;
    }

    public function setCarBody(string $carBody): void
    {
        $this->carBody = $carBody;
    }

    public function getFullInfoCar(): array
    {
        $fullInfo =  parent::getFullInfoCar();
        $fullInfo[] = $this->color;
        $fullInfo[] = $this->carBody;

        return $fullInfo;
    }
}
