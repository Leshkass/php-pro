<?php
declare(strict_types=1);

namespace App\Entity\Enum;

enum Status : string
{
    case Performance = 'performance';
    case Completed = 'completed';
    case Not_Done = 'not_done';
}
