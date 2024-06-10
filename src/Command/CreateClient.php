<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Client;
use App\Entity\Exceptions\InvalidName;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:client')]

class CreateClient extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager,
    private readonly Generator $faker)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('firstName', InputArgument::OPTIONAL, 'Client first name')
            ->addArgument('lastName', InputArgument::OPTIONAL, 'Client last name')
            ->addArgument('email', InputArgument::OPTIONAL, 'Client email');
    }

    /**
     * @throws InvalidName
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $client = new Client();
        $client->setFirstName($input->getArgument('firstName') ?? $this->faker->firstName());
        $client->setLastName($input->getArgument('lastName') ?? $this->faker->lastName);
        $client->setEmail($input->getArgument('email') ?? $this->faker->email);

        $this->entityManager->persist($client);
        $this->entityManager->flush();



        return Command::SUCCESS;
    }
}