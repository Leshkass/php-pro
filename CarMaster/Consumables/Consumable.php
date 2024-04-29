<?php

declare(strict_types=1);

namespace CarMaster\Consumables;

abstract class Consumable
{
    private string $manufacturer;

    private int $quantity;

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getFullInfoConsumable(): array
    {
        return [
            $this->getManufacturer(),
            $this->getQuantity()
        ];
    }
}
