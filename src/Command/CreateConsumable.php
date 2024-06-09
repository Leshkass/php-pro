<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Antifreeze;
use App\Entity\Enum\Unit;
use App\Entity\Manufacturer;
use App\Entity\Oil;
use CarMaster\Service;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:consumable')]
class CreateConsumable extends Command
{
    private const CONSUMABLE_TYPE_ANTIFREEZE = 'antifreeze';
    private const CONSUMABLE_TYPE_OIL = 'oil';

    protected function configure(): void
    {
        $this->addArgument('consumableType', InputArgument::REQUIRED);
    }


    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();


        $services = new Service();
        $entityManager = $services->createORMEntityManager();

        $brand = new Manufacturer();
        $brand->setName($faker->name);
        $entityManager->persist($brand);
        $entityManager->flush();

        switch ($input->getArgument('consumableType')) {
            case self::CONSUMABLE_TYPE_ANTIFREEZE:
                $consumable = new Antifreeze();
                $consumable->setColor($faker->colorName);
                $consumable->setTemperature($faker->randomNumber());
                break;

            case self::CONSUMABLE_TYPE_OIL:
                $consumable = new Oil();
                $consumable->setViscosity($faker->text(20));
                break;

            default:
                throw new \Exception('Bad consumable type');
        }
        $consumable->setManufacturer($brand);
        $consumable->setName($faker->name);
        $consumable->setQuantity($faker->randomNumber());
        $consumable->setUnit(Unit::Liter);

        $entityManager->persist($consumable);
        $entityManager->flush();

        return Command::SUCCESS;
    }
}