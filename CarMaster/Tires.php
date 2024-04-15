<?php
declare(strict_types=1);

require_once 'Spares.php';

class Tires extends Spares
{
    private int $sizeTires;

    private string $markingTires;

    public function getMarkingTires(): string
    {
        return $this->markingTires;
    }

    public function setMarkingTires(string $markingTires): void
    {
        $this->markingTires = $markingTires;
    }

    public function getSizeTires(): int
    {
        return $this->sizeTires;
    }

    public function setSizeTires(int $sizeTires): void
    {
        $this->sizeTires = $sizeTires;
    }

    public function getFullInfoSpares(): array
    {
        $fullInfo = parent::getFullInfoSpares();
        $fullInfo[] = $this->markingTires;
        $fullInfo[] = $this->sizeTires;

        return $fullInfo;
    }
}