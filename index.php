<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';


use CarMaster\Command\CreateCar;
use CarMaster\Command\CreateClient;
use CarMaster\Command\CreateConsumable;
use CarMaster\Command\CreateSpares;
use CarMaster\Command\ExportCarCommand;
use CarMaster\Command\OutputCarCommand;
use CarMaster\Service;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;









$output = new ConsoleOutput();
$application = new Application();


    $application->addCommands([
        new CreateClient(),
        new CreateCar(),
        new CreateSpares(),
        new CreateConsumable(),
        new OutputCarCommand(),
        new ExportCarCommand()
        ]);

    $services = new Service();
    ConsoleRunner::addCommands($application, new SingleManagerProvider($services->createORMEntityManager()));
    $application->run(new ArgvInput(), $output);












