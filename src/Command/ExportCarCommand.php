<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use CarMaster\Service;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'export:car')]
class ExportCarCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $services = new Service();
        $entityManager = $services->createORMEntityManager();

        $repo = $entityManager->getRepository(Car::class);
        $queryBuilder = $repo->createQueryBuilder('c');

        $result = $queryBuilder->select(['c.brand', 'c.model', 'c.year', 'c.color'])->getQuery()->toIterable();

        $fileName = 'car.csv';

        $fp = fopen($fileName, 'w');

        foreach ($result as $item){
            fputcsv($fp, (array)$item);
        }

        fclose($fp);


        return Command::SUCCESS;
    }

}