<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'export:car')]
class ExportCarCommand extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $queryBuilder = $this->entityManager->getRepository(Car::class)
            ->createQueryBuilder('c');

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