<?php

namespace App\Entity\Enum;

enum BodyType: string
{
    case Sedan = 'sedan';
    case Universal = 'universal';
    case Coupe = 'coupe';
    case Hatchback = 'hatchback';
    case Limousine = 'limousine';

}