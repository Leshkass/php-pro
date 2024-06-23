<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Order;

readonly class ServiceCostCalculator
{
    public function calculateTotalCost(Order $order): int
    {
        $price  = 0;

        $orderWorks = $order->getOrderWorks();

        foreach($orderWorks as $orderWork) {

            foreach($orderWork->getSpares() as $spare){

                $price += $spare->getPrice();
            }

            foreach($orderWork->getConsumables() as $consumable) {

                $price += $consumable->getPrice();
            }

            $price += $orderWork->getCostOfWork();
        }

        return $price;

    }





}