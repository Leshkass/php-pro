<?php
declare(strict_types=1);

require_once 'Car.php';

class Consumables extends Car
{
    private string $oil;
    private int $quantityOil;

    private string $antifreeze;
    private int $quantityAntifreeze;

    public function getOil(): string
    {
        return $this->oil;
    }

    public function setOil(string $oil): void
    {
        $this->oil = $oil;
    }

    public function getQuantityOil(): int
    {
        return $this->quantityOil;
    }

    public function setQuantityOil(int $quantityOil): void
    {
        $this->quantityOil = $quantityOil;
    }

    public function getAntifreeze(): string
    {
        return $this->antifreeze;
    }

    public function setAntifreeze(string $antifreeze): void
    {
        $this->antifreeze = $antifreeze;
    }

    public function getQuantityAntifreeze(): int
    {
        return $this->quantityAntifreeze;
    }

    public function setQuantityAntifreeze(int $quantityAntifreeze): void
    {
        $this->quantityAntifreeze = $quantityAntifreeze;
    }

    public function getFullInfo(): string
    {
        return $this->getOil() . ' ' . $this->getQuantityOil() . PHP_EOL .  $this->getAntifreeze() . ' ' . $this->getQuantityAntifreeze() . PHP_EOL;
    }
}