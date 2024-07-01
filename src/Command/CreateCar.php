<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use App\Entity\Enum\BodyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:car')]
class CreateCar extends Command
{

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

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
        $firstCar = new Car();
        $firstCar->setBrand($input->getArgument('brand'));
        $firstCar->setModel($input->getArgument('model'));
        $firstCar->setYear((int)$input->getArgument('year'));
        $firstCar->setColor($input->getArgument('color'));
        $firstCar->setBodyType(BodyType::tryFrom((string) $input->getArgument('bodyType')));


        $this->entityManager->persist($firstCar);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}