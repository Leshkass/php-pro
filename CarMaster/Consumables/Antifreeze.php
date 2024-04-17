<?php

declare(strict_types=1);

namespace CarMaster\Consumables;

class Antifreeze extends Consumables
{
    private string $color;

    private float $temperature;

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
    public function getFullInfoConsumable(): array
    {
        $fullInfo = parent::getFullInfoConsumable();
        $fullInfo[] = $this->color;
        $fullInfo[] = $this->temperature;

        return $fullInfo;
    }


}