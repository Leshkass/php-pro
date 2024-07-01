<?php
declare(strict_types=1);

namespace App\Entity\Enum;

enum Unit: string
{
    case Kilogram = 'Kg';
    case Liter = 'L';
    case Halon = 'H';
    case Things = 'Th';
}
