<?php
declare(strict_types=1);

require_once 'Consumables.php';

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

    public function getFullInfoAntifreeze(): string
    {
        return parent::getManufacturer() . ' ' . parent::getQuantity() . PHP_EOL
            . $this->getColor() . ' ' . $this->getTemperature();
    }
}