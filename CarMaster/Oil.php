<?php
declare(strict_types=1);

require_once 'Consumables.php';

class Oil extends Consumables
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

    public function getFullInfoOil(): string
    {
        return parent::getManufacturer() . ' ' . parent::getQuantity() . PHP_EOL
            . $this->getBrandOil() . ' ' . $this->getViscosityOil();
    }


}