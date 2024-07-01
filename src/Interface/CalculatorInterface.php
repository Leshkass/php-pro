<?php
declare(strict_types=1);

namespace App\Interface;

use App\Entity\Order;

interface CalculatorInterface
{
    public function calculateTotalCost(Order $order): int;

}