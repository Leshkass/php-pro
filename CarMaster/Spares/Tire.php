<?php

declare(strict_types=1);

namespace CarMaster\Spares;

use CarMaster\Exceptions\InvalidSizeTire;

class Tire extends SparePart
{
    private int $sizeTire;

    private string $markingTire;

    public function getMarking(): string
    {
        return $this->markingTire;
    }

    public function setMarking(string $markingTire): void
    {
        $this->markingTire = $markingTire;
    }

    public function getSize(): int
    {
        return $this->sizeTire;
    }

    /**
     * @throws InvalidSizeTire
     */
    public function setSize(int $sizeTire): void
    {
        if (($this->sizeTire) < 13) {
            throw new InvalidSizeTire('Size cannot be less than 13');
        }

        $this->sizeTire = $sizeTire;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $fullInfo[] = $this->markingTire;
        $fullInfo[] = $this->sizeTire;

        return $fullInfo;
    }
}
