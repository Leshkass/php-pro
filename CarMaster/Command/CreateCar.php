<?php

declare(strict_types=1);

namespace CarMaster\Command;

use CarMaster\Entity\Car;
use CarMaster\Entity\Enum\BodyType;
use CarMaster\Service;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:car')]
class CreateCar extends Command
{
    protected function configure(): void
    {
        $this->addArgument('brand', InputArgument::REQUIRED, 'Car brand, for example Audi or BWM')
            ->addArgument('model', InputArgument::REQUIRED, 'Car model')
            ->addArgument('year', InputArgument::REQUIRED, 'Car year')
            ->addArgument('color', InputArgument::OPTIONAL, 'Car color')
            ->addArgument('bodyType', InputArgument::OPTIONAL, 'Car body type');
    }


    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $services = new Service();

        $firstCar = new Car();
        $firstCar->setBrand($input->getArgument('brand'));
        $firstCar->setModel($input->getArgument('model'));
        $firstCar->setYear((int)$input->getArgument('year'));
        $firstCar->setColor($input->getArgument('color'));
        $firstCar->setBodyType(BodyType::tryFrom((string) $input->getArgument('bodyType')));

        $entityManager = $services->createORMEntityManager();
        $entityManager->persist($firstCar);
        $entityManager->flush();

        return Command::SUCCESS;
    }
}