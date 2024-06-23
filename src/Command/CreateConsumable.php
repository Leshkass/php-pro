<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Antifreeze;
use App\Entity\Enum\ColorAntifreeze;
use App\Entity\Enum\Unit;
use App\Entity\Manufacturer;
use App\Entity\Oil;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:consumable')]
class CreateConsumable extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager,
    private readonly Generator $faker)
    {
        parent::__construct();
    }

    private const CONSUMABLE_TYPE_ANTIFREEZE = 'antifreeze';
    private const CONSUMABLE_TYPE_OIL = 'oil';

    protected function configure(): void
    {
        $this
            ->addArgument('consumableType', InputArgument::REQUIRED)
            ->addArgument('colorConsumable', InputArgument::REQUIRED)
            ->addArgument('temperature', InputArgument::REQUIRED)
            ->addArgument('viscosity', InputArgument::REQUIRED)
            ->addArgument('nameConsumable', InputArgument::REQUIRED)
            ->addArgument('quantity', InputArgument::REQUIRED)
            ->addArgument('price', InputArgument::REQUIRED);
    }


    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $brand = new Manufacturer();
        $brand->setName($this->faker->country());
        $this->entityManager->persist($brand);
        $this->entityManager->flush();

        switch ($input->getArgument('consumableType')) {
            case self::CONSUMABLE_TYPE_ANTIFREEZE:
                $consumable = new Antifreeze();
                $consumable->setColor(ColorAntifreeze::tryFrom((string)$input->getArgument('colorConsumable')));
                $consumable->setTemperature((int)$input->getArgument('temperature'));
                break;

            case self::CONSUMABLE_TYPE_OIL:
                $consumable = new Oil();
                $consumable->setViscosity($input->getArgument('viscosity'));
                break;

            default:
                throw new \Exception('Bad consumable type');
        }
        $consumable->setManufacturer($brand);
        $consumable->setName($input->getArgument('nameConsumable'));
        $consumable->setQuantity((int)$input->getArgument('quantity'));
        $consumable->setUnit(Unit::Liter);
        $consumable->setPrice((int)$input->getArgument('price'));

        $this->entityManager->persist($consumable);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}