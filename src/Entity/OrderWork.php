<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Enum\Status;
use App\Entity\Enum\Type;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'order_work')]
class OrderWork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private int $id;

    #[ORM\Column(name: 'status',enumType: Status::class)]
    private Status $status;

    #[ORM\Column(name: 'type',enumType: Type::class)]
    private Type $type;

    #[ORM\Column(name: 'cost_of_work', type: 'integer')]
    private int $costOfWork;

    #[ORM\JoinColumn(name: 'order_id')]
    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderWorks')]
    private Order $order;

    #[ORM\JoinTable(name: 'order_work_consumable')]
    #[ORM\JoinColumn(name: 'order_work_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'consumable_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Consumable::class)]
    private Collection $consumables;

    #[ORM\JoinTable(name: 'order_work_spares')]
    #[ORM\JoinColumn(name: 'order_work_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'spares_id',referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Spare::class)]
    private Collection $spares;

    public function __construct()
    {
        $this->consumables = new ArrayCollection();
        $this->spares = new ArrayCollection();
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getCostOfWork(): int
    {
        return $this->costOfWork;
    }

    public function setCostOfWork(int $costOfWork): void
    {
        $this->costOfWork = $costOfWork;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    /**
     * @return Collection|Consumable[]
     */
    public function getConsumables():Collection
    {
        return $this->consumables;
    }

    public function addConsumable(Consumable $consumable): void
    {
        if(!$this->consumables->contains($consumable)) {
            $this->consumables->add($consumable);
        }
    }

    /**
     * @return Collection|Spare[]
     */
    public function getSpares(): Collection
    {
        return $this->spares;
    }

    public function addSpare(Spare $spare): void
    {
        if (!$this->spares->contains($spare)) {
            $this->spares->add($spare);
        }
    }

}