<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Wheel::class, mappedBy="car")
     */
    private $wheels;

    /**
     * @ORM\OneToOne(targetEntity=SteeringWheel::class, mappedBy="car")
     */
    private $steeringWheel;

    public function __construct()
    {
        $this->wheels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Wheel[]
     */
    public function getWheels(): Collection
    {
        return $this->wheels;
    }

    public function addWheel(Wheel $wheel): self
    {
        if (!$this->wheels->contains($wheel)) {
            $this->wheels[] = $wheel;
            $wheel->setCar($this);
        }

        return $this;
    }

    public function removeWheel(Wheel $wheel): self
    {
        if ($this->wheels->removeElement($wheel)) {
            // set the owning side to null (unless already changed)
            if ($wheel->getCar() === $this) {
                $wheel->setCar(null);
            }
        }

        return $this;
    }

    public function getSteeringWheel(): ?SteeringWheel
    {
        return $this->steeringWheel;
    }

    public function setSteeringWheel(SteeringWheel $steeringWheel): self
    {
        // set the owning side of the relation if necessary
        if ($steeringWheel->getCar() !== $this) {
            $steeringWheel->setCar($this);
        }

        $this->steeringWheel = $steeringWheel;

        return $this;
    }


}
