<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Exceptions\InvalidName;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
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

    /**
     * @throws InvalidName
     */
    #[Route('/{firstName}/{lastName}', name: 'app_client_create_new')]
    public function create(string $firstName, string $lastName, EntityManagerInterface $entityManager): Response
    {
        $faker = Factory::create();

        $client = new Client();
        $client->setFirstName($firstName);
        $client->setLastName($lastName);
        $client->setEmail( $faker->email);

        $entityManager->persist($client);
        $entityManager->flush();

        return new JsonResponse($client->getFullInfo());

    }




}
