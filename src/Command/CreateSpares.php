<?php

namespace App\Command;

use App\Entity\Category;
use App\Entity\Manufacturer;
use App\Entity\Spares;

use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:spares')]
class CreateSpares extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager,
    private readonly Generator $faker)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'name spare part')
            ->addArgument('ean_number', InputArgument::REQUIRED, 'ean-number spare part');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {


        $category = new Category();
        $category->setName($this->faker->firstName);
        $this->entityManager->persist($category);
        $this->entityManager->flush();

        $brand = new Manufacturer();
        $brand->setName($this->faker->country);
        $this->entityManager->persist($brand);
        $this->entityManager->flush();

        $tire = new Spares();

        $tire->setName($input->getArgument('name'));
        $tire->setEanNumber($input->getArgument('ean_number'));
        $tire->setCategory($category);
        $tire->setManufacturer($brand);

        $this->entityManager->persist($tire);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }

}