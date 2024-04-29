<?php

declare(strict_types=1);

namespace CarMaster\Spares;

class Bearing extends SparePart
{
    private float|int $size;

    private string $marking;

    public function getSize(): float|int
    {
        return $this->size;
    }

    public function setSize(float|int $size): void
    {
        $this->size = $size;
    }

    public function getMarking(): string
    {
        return $this->marking;
    }

    public function setMarking(string $marking): void
    {
        $this->marking = $marking;
    }

    public function getFullInfoSpares(): array
    {
        $fullInfo = parent::getFullInfoSpares();
        $fullInfo[] = $this->marking;
        $fullInfo[] = $this->size;

        return $fullInfo;
    }
}
