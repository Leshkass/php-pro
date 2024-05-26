<?php
declare(strict_types=1);

namespace CarMaster\Entity;

use CarMaster\Entity\Enum\BodyType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'car')]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;

    #[ORM\Column(name: 'brand', type: 'string', length: 150)]
    private string $brand;

    #[ORM\Column(name: 'model', type: 'string', length: 50)]
    private string $model;

    #[ORM\Column(name: 'year', type: 'integer')]
    private int $year;

    #[ORM\Column(name: 'color', type: 'string', length: 50, nullable: true)]
    private ?string $color;

    #[ORM\Column(name: 'body_type', nullable: true, enumType: BodyType::class)]
    private ?BodyType $bodyType;

    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'cars')]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function addClient(Client $client): void
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->addCar($this);
        }
    }

    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getBodyType(): ?BodyType
    {
        return $this->bodyType;
    }

    public function setBodyType(?BodyType $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

}