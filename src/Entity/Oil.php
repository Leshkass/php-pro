<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Oil extends Consumable
{
    #[ORM\Column(name: 'viscosity', type: 'string')]
    private string $viscosity;

    public function getViscosity(): string
    {
        return $this->viscosity;
    }

    public function setViscosity(string $viscosity): void
    {
        $this->viscosity = $viscosity;
    }
}
