<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use App\Entity\Client;
use App\Entity\Enum\BodyType;
use App\Entity\Exceptions\InvalidName;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:order')]
class CreateOrder extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager,
    private readonly Generator $faker)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('brand', InputArgument::REQUIRED, 'Car brand, for example Audi or BWM')
            ->addArgument('model', InputArgument::REQUIRED, 'Car model')
            ->addArgument('year', InputArgument::REQUIRED, 'Car year')
            ->addArgument('orderPrice', InputArgument::REQUIRED, 'price order')
            ->addArgument('vinCode', InputArgument::REQUIRED, 'vin code of car')
            ->addArgument('color', InputArgument::OPTIONAL, 'Car color')
            ->addArgument('bodyType', InputArgument::OPTIONAL, 'Car body type')
            ->addArgument('firstName', InputArgument::OPTIONAL, 'Client first name')
            ->addArgument('lastName', InputArgument::OPTIONAL, 'Client last name')
            ->addArgument('email', InputArgument::OPTIONAL, 'Client email');
    }

    /**
     * @throws InvalidName
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $car = new Car();
        $car->setBrand($input->getArgument('brand'));
        $car->setModel($input->getArgument('model'));
        $car->setYear((int)$input->getArgument('year'));
        $car->setColor($input->getArgument('color'));
        $car->setBodyType(BodyType::Universal);

        $this->entityManager->persist($car);

        $client = new Client();
        $client->setFirstName($this->faker->firstName());
        $client->setLastName($this->faker->lastName());
        $client->setEmail($this->faker->email());

        $this->entityManager->persist($client);

        $order = new Order();
        $order->setVinCode($input->getArgument('vinCode'));
        $order->setOrderPrice((int)$input->getArgument('orderPrice'));
        $order->setCar($car);
        $order->setClient($client);

        $this->entityManager->persist($order);

        $this->entityManager->flush();


        return Command::SUCCESS;
    }

}