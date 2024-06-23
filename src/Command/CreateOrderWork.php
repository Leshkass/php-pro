<?php
declare(strict_types=1);

namespace App\Command;

use App\Entity\Car;
use App\Entity\Client;
use App\Entity\Enum\BodyType;
use App\Entity\Enum\Status;
use App\Entity\Enum\Type;
use App\Entity\Exceptions\InvalidName;
use App\Entity\Order;
use App\Entity\OrderWork;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Generator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:work')]
class CreateOrderWork extends Command
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
            ->addArgument('vinCode', InputArgument::REQUIRED, 'vin code of car')
            ->addArgument('status', InputArgument::REQUIRED,'status work')
            ->addArgument('type', InputArgument::REQUIRED,'type  work')
            ->addArgument('costWork', InputArgument::REQUIRED,'price of work')
            ->addArgument('orderPrice', InputArgument::REQUIRED, 'price order')
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
        $car->setBodyType(BodyType::Limousine);

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

        $work = new OrderWork();
        $work->setOrder($order);
        $work->setStatus(Status::tryFrom((string)$input->getArgument('status')));
        $work->setType(Type::tryFrom((string)$input->getArgument('type')));
        $work->setCostOfWork((int)$input->getArgument('costWork'));

        $this->entityManager->persist($work);

        $this->entityManager->flush();

        return Command::SUCCESS;
    }


}