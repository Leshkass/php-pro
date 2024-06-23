<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Enum\ColorAntifreeze;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Antifreeze extends Consumable
{
    #[ORM\Column(name: 'color', enumType: ColorAntifreeze::class)]
    private ColorAntifreeze $color;

    #[ORM\Column(name: 'temperature', type: 'integer')]
    private int $temperature;

    public function getTemperature(): int
    {
        return $this->temperature;
    }

    public function setTemperature(int $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function getColor(): ColorAntifreeze
    {
        return $this->color;
    }

    public function setColor(ColorAntifreeze $color): void
    {
        $this->color = $color;
    }
}
