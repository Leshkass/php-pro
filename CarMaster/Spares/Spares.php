<?php

declare(strict_types=1);

namespace CarMaster\Spares;

abstract class Spares
{
    private int $vinCodeSpare;

    private string $manufacturerSpare;

    public function getManufacturerSpare(): string
    {
        return $this->manufacturerSpare;
    }

    public function setManufacturerSpare(string $manufacturerSpares): void
    {
        $this->manufacturerSpare = $manufacturerSpares;
    }

    public function getVinCodeSpare(): int
    {
        return $this->vinCodeSpare;
    }

    public function setVinCodeSpare(int $vinCodeSpare): void
    {
        $this->vinCodeSpare = $vinCodeSpare;
    }

    public function getFullInfoSpares(): array
    {
        return [
            $this->getVinCodeSpare(),
            $this->getManufacturerSpare()
        ];
    }

}