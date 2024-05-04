<?php

declare(strict_types=1);

namespace CarMaster\Consumables;

abstract class Consumable
{
    private string $countryManufacturer;

    private int $quantity;

    public function getManufacturer(): string
    {
        return $this->countryManufacturer;
    }

    public function setManufacturer(string $countryManufacturer): void
    {
        $this->countryManufacturer = $countryManufacturer;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getFullInfo(): array
    {
        return [
            $this->getManufacturer(),
            $this->getQuantity()
        ];
    }
}
