<?php

namespace CarMaster;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Service
{
    public function createORMEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__],
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            'driver'   => 'pdo_mysql',
            'host'   => getenv('DB_HOST'),
            'user'     => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'dbname'   => getenv('DB_NAME'),
        ], $config);

        return new EntityManager($connection, $config);
    }

}