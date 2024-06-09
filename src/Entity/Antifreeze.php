<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Antifreeze extends Consumable
{
    #[ORM\Column(name: 'color', type: 'string')]
    private string $color;

    #[ORM\Column(name: 'temperature', type: 'float')]
    private float $temperature;

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}
