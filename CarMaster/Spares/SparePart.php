<?php

declare(strict_types=1);

namespace CarMaster\Spares;

abstract class SparePart
{
    private int $vinCodeSpare;

    private string $manufacturerSpare;

    public function getManufacturer(): string
    {
        return $this->manufacturerSpare;
    }

    public function setManufacturer(string $manufacturerSpares): void
    {
        $this->manufacturerSpare = $manufacturerSpares;
    }

    public function getVinCode(): int
    {
        return $this->vinCodeSpare;
    }

    public function setVinCode(int $vinCodeSpare): void
    {
        $this->vinCodeSpare = $vinCodeSpare;
    }

    public function getFullInfo(): array
    {
        return [
            $this->getVinCode(),
            $this->getManufacturer()
        ];
    }
}
