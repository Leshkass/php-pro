<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Order;
use App\Interface\CalculatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/order')]
class OrderController extends AbstractController
{
    #[Route('/{id}/total-cost', name: 'total-cost-order')]
    public function index(?Order  $order, CalculatorInterface $calculator): Response
    {
        if ($order === null) {
            return  new Response('Order is not found');
        }

        $cost = $calculator->calculateTotalCost($order);

        return new JsonResponse([
            'TotalCost' => $cost,
            'VinCode' => $order->getVinCode(),
            'CarInfo' => $order->getCar()->getFullInfo(),
            'FullName' => $order->getCar()->getFullName()
        ]);
    }

}