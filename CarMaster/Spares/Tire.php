<?php

declare(strict_types=1);

namespace CarMaster\Spares;

use CarMaster\Exceptions\InvalidSizeTire;

class Tire extends SparePart
{
    private int $size;

    private string $marking;

    public function getMarking(): string
    {
        return $this->marking;
    }

    public function setMarking(string $marking): void
    {
        $this->marking = $marking;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @throws InvalidSizeTire
     */
    public function setSize(int $size): void
    {
        if (($this->size) < 13) {
            throw new InvalidSizeTire('Size cannot be less than 13');
        }

        $this->size = $size;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo[] = $this->marking;
        $fullInfo[] = $this->size;

        return $fullInfo;
    }
}
