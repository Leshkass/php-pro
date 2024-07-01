<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/car')]
class CarController extends AbstractController
{
    #[Route('/{id}', name: 'app_car')]
    public function index(int $id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);
        return new JsonResponse($car instanceof Car ? $car->getFullInfo() : []);
    }

    #[Route('/get-by-color/{color}', name: 'app_car_color')]
    public function findColor(string $color, CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAllByColor($color);
        $result = [];
        foreach ($cars as $car){
            $result[] = $car->getFullInfo();
        }

        return new JsonResponse($result);
    }

}
