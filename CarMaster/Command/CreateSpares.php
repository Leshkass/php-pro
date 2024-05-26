<?php

namespace CarMaster\Command;

use CarMaster\Entity\Category;
use CarMaster\Entity\Manufacturer;
use CarMaster\Entity\Spares;
use CarMaster\Service;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:spares')]
class CreateSpares extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'name spare part')
            ->addArgument('ean_number', InputArgument::REQUIRED, 'ean-number spare part');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();

        $services = new Service();
        $entityManager = $services->createORMEntityManager();

        $category = new Category();
        $category->setName($faker->firstName);
        $entityManager->persist($category);
        $entityManager->flush();

        $brand = new Manufacturer();
        $brand->setName($faker->country);
        $entityManager->persist($brand);
        $entityManager->flush();

        $tire = new Spares();

        $tire->setName($input->getArgument('name'));
        $tire->setEanNumber($input->getArgument('ean_number'));
        $tire->setCategory($category);
        $tire->setManufacturer($brand);

        $entityManager->persist($tire);
        $entityManager->flush();

        return Command::SUCCESS;
    }

}