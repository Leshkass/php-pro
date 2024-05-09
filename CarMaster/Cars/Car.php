<?php

declare(strict_types=1);

namespace CarMaster\Cars;

use CarMaster\Clients\Client;

abstract class Car
{
    private string $nameCar;

    private string $modelCar;

    private Client $client;

    public function setNameCar(string $nameCar): void
    {
        $this->nameCar = $nameCar;
    }

    public function getNameCar(): string
    {
        return $this->nameCar;
    }

    public function getModel(): string
    {
        return $this->modelCar;
    }

    public function setModel(string $modelCar): void
    {
        $this->modelCar = $modelCar;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getFullInfo(): array
    {
        return [
            $this->getClient()->getFullName(),
            $this->getNameCar(),
            $this->getModel()
        ];
    }
}
