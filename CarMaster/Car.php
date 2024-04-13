<?php
declare(strict_types=1);

 abstract class Car
{
    private string $nameCar;
    private string $modelCar;
    private string $bodyType;
    private int $horsePower = 0;
    private Client $client;

     public function getModelCar(): string
     {
         return $this->modelCar;
     }

     public function setModelCar(string $modelCar): void
     {
         $this->modelCar = $modelCar;
     }

     public function getHorsePower(): int
     {
         return $this->horsePower;
     }

     public function setHorsePower(int $horsePower): void
     {
         $this->horsePower = $horsePower;
     }

     public function getNameCar(): string
     {
         return $this->nameCar;
     }

     public function setNameCar(string $nameCar): void
     {
         $this->nameCar = $nameCar;
     }

     public function getBodyType(): string
     {
         return $this->bodyType;
     }

     public function setBodyType(string $bodyType): void
     {
         $this->bodyType = $bodyType;
     }

     public function getClient(): Client
     {
         return $this->client;
     }

     public function setClient(Client $client): void
     {
         $this->client = $client;
     }


 }