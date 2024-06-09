<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/client')]
class ClientController extends AbstractController
{
    #[Route('/{id}', name: 'app_client')]
    public function index(int $id, ClientRepository $clientRepository): Response
    {
        $client = $clientRepository->find($id);
        return new JsonResponse($client instanceof Client ? $client->getFullInfo() : []);
    }


}
