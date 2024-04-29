<?php

declare(strict_types=1);

namespace CarMaster\Consumables;

class Oil extends Consumable
{
    private string $brandOil;

    private string $viscosityOil;

    public function getViscosityOil(): string
    {
        return $this->viscosityOil;
    }

    public function setViscosityOil(string $viscosityOil): void
    {
        $this->viscosityOil = $viscosityOil;
    }

    public function getBrandOil(): string
    {
        return $this->brandOil;
    }

    public function setBrandOil(string $brandOil): void
    {
        $this->brandOil = $brandOil;
    }

    public function getFullInfoConsumable(): array
    {
        $fullInfo = parent::getFullInfoConsumable();
        $fullInfo[] = $this->brandOil;
        $fullInfo[] = $this->viscosityOil;

        return $fullInfo;
    }
}
