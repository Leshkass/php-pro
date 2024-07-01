<?php

namespace App\Command;

use App\Entity\Order;
use App\Entity\OrderWork;
use App\Entity\Spare;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'create:work-spares')]
class CreateWorkSpares extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->addArgument('id', InputArgument::REQUIRED, 'id work order')
            ->addArgument('name',InputArgument::REQUIRED, 'name spares');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $queryBuilderWork = $this->entityManager->getRepository(OrderWork::class)
            ->createQueryBuilder('o')
            ->where('o.id = :id')
            ->setParameter('id',($input->getArgument('id')));

        $orderWorks = $queryBuilderWork->getQuery()->getResult();

        $queryBuilderSpares = $this->entityManager->getRepository(Spare::class)
            ->createQueryBuilder('s')
            ->where('s.name = :name')
            ->setParameter('name', ($input->getArgument('name')));

        /** @var Spare[] $spares */
        $spares = $queryBuilderSpares->getQuery()->getResult();
        $spare = $spares[0];

        /** @var OrderWork[] $orderWorks */
        foreach($orderWorks as $orderWork) {
            $orderWork->addSpare($spare);
        }

        $this->entityManager->flush();

        return Command::SUCCESS;



    }


}