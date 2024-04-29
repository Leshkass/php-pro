<?php

declare(strict_types=1);

namespace CarMaster\Consumables;

class Oil extends Consumable
{
    private string $brand;

    private string $viscosity;

    public function getViscosity(): string
    {
        return $this->viscosity;
    }

    public function setViscosity(string $viscosity): void
    {
        $this->viscosity = $viscosity;
    }

    public function getBrandOil(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo[] = $this->brand;
        $fullInfo[] = $this->viscosity;

        return $fullInfo;
    }
}
