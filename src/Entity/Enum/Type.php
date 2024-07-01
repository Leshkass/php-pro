<?php
declare(strict_types=1);

namespace App\Entity\Enum;

enum Type : string
{
    case Tinting = 'tinting';

    case Change_Oil = 'change_oil';
    case Tire_Replacement = 'tire_replacement';
}
