<?php
declare(strict_types=1);

require_once 'Car.php';

class Procurement extends Car
{
    private string $spare;

    private int $vinCode;

    public function getSpare(): string
    {
        return $this->spare;
    }

    public function setSpare(string $spare): void
    {
        $this->spare = $spare;
    }

    public function getVinCode(): int
    {
        return $this->vinCode;
    }

    public function setVinCode(int $vinCode): void
    {
        $this->vinCode = $vinCode;
    }



}