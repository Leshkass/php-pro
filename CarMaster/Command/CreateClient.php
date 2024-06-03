<?php
declare(strict_types=1);

namespace CarMaster\Command;

use CarMaster\Entity\Client;
use CarMaster\Service;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:client')]

class CreateClient extends Command
{

    protected function configure(): void
    {
        $this->addArgument('firstName', InputArgument::OPTIONAL, 'Client first name')
            ->addArgument('lastName', InputArgument::OPTIONAL, 'Client last name')
            ->addArgument('email', InputArgument::OPTIONAL, 'Client email');
    }
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();

        $services = new Service();

        $client = new Client();
        $client->setFirstName($input->getArgument('firstName') ?? $faker->firstName);
        $client->setLastName($input->getArgument('lastName') ?? $faker->lastName);
        $client->setEmail($input->getArgument('email') ?? $faker->email);

        $entityManager = $services->createORMEntityManager();
        $entityManager->persist($client);
        $entityManager->flush();



        return Command::SUCCESS;
    }
}