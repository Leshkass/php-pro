<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use App\Entity\Client;
use CarMaster\Service;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'output:car')]
class OutputCarCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('id', InputArgument::REQUIRED);
    }


    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $services = new Service();
        $entityManager = $services->createORMEntityManager();

        $repo = $entityManager->getRepository(Car::class);
        $queryBuilder = $repo->createQueryBuilder('c');

        $queryBuilder
            ->where('c.id = :id')
            ->setParameter('id', ($input->getArgument('id')));

        /** @var Car $item */
        $exportCar = $queryBuilder->getQuery()->getResult();

        foreach($exportCar as $item){
            echo $item->getBrand() . PHP_EOL;
            echo $item->getModel() . PHP_EOL;
            echo $item->getYear() . PHP_EOL;
            echo $item->getColor() . PHP_EOL;
            echo $item->getBodyType()->value . PHP_EOL;
            $clients = $item->getClients();

            /** @var Client $clients */
            
            foreach ($clients as $client){
                echo $client->getFullName() . PHP_EOL;
            }
        }

        return Command::SUCCESS;
    }
}
