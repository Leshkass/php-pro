<?php

declare(strict_types=1);

namespace CarMaster\Cars;

class Audi extends Car
{
    private string $color;

    private string $bodyType;

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getBodyType(): string
    {
        return $this->bodyType;
    }

    public function setBodyType(string $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    public function getFullInfo(): array
    {
        $fullInfo =  parent::getFullInfo();
        $fullInfo[] = $this->color;
        $fullInfo[] = $this->bodyType;

        return $fullInfo;
    }
}
