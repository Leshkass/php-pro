<?php

declare(strict_types=1);

namespace CarMaster\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'spares')]
class Spares
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;

    #[ORM\JoinColumn(name: 'category_id')]
    #[ORM\ManyToOne(targetEntity: Category::class)]
    private Category $category;

    #[ORM\JoinColumn(name: 'manufacturer_id')]
    #[ORM\ManyToOne(targetEntity: Manufacturer::class)]
    private Manufacturer $manufacturer;

    #[ORM\Column(name: 'name',type: 'string')]
    private string $name;

    #[ORM\Column(name: 'ean_number',type: 'integer')]
    private int $eanNumber;


    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    public function setManufacturer(Manufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEanNumber(): int
    {
        return $this->eanNumber;
    }

    public function setEanNumber(int $eanNumber): void
    {
        $this->eanNumber = $eanNumber;
    }

}
